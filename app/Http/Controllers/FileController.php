<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $directories = Directory::all()->where('directory_id', null)->where('user_id', Auth::id());
        $files = File::all()->where('directory_id', null)->where('user_id', Auth::id());

        return \response()->view('contents.pages.files', compact([
            'files',
            'directories',
        ]));
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $directories = Directory::all();
        $directory = $directories->find($request->directory);

        if (!empty($file))
        {
            $user_folder = stristr(Auth::user()['email'], '@', true);
            $file_name = $file->getClientOriginalName();

            if ($directory)
            {
                $path = $file->storeAs($directory->path, $file_name);
            } else {
                $path = $file->storeAs('private/'.$user_folder, $file_name);
            }


            File::create([
                'name' => $file_name,
                'path' => $path,
                'user_id' => Auth::id(),
                'directory_id' => $request->directory,
            ]);
        }

        return redirect()->back();
    }

    public function download(Request $request)
    {
        $path = Storage::disk('local')->path($request->path);
        return response()->download($path, basename($path));
    }

    public function move(Request $request, File $file)
    {
        $directory = Directory::find($request->directory);
        $new_path = 'private/'.stristr(Auth::user()['email'], '@', true).'/'.$file->name;
        $directory_id = null;

        if ($request->directory != 0)
        {
            $new_path = $directory->path.'/'.$file->name;
            $directory_id = $directory->id;
        }

        Storage::move($file->path, $new_path);

        $file->update([
            'path' =>  $new_path,
            'directory_id' => $directory_id
        ]);

        return redirect()->back();
    }

    public function rename(Request $request, File $file)
    {
        $ext = stristr($file->name, '.');
        $new_name = stristr($request->name, '.', true);
        if (!$new_name)
        {
            $new_name = $request->name;
        }
        $new_path = stristr($file->path, $file->name, true).$new_name.$ext;

        Storage::move($file->path, $new_path);

        $file->update([
            'path' =>  $new_path,
            'name' => $new_name.$ext
        ]);

        return redirect()->back();
    }

    public function destroy(File $file)
    {
        if (!Storage::missing($file->path) && $file)
        {
            $recycle_folder = 'recycle'.stristr($file->path, '/');
            Storage::move($file->path, $recycle_folder);
            if ($file->shared)
            {
                $file->shared->delete();
            }
            $file->update([
                'path' => $recycle_folder,
                'shared_id' => null
            ]);
            $file->delete();
            $type = 'success';
            $message = 'Файл '.$file->name.' удален';
        } else {
            $type = 'error';
            $message = 'Файл не существует';
        }

        return redirect()->back()->with($type, $message);
    }
}
