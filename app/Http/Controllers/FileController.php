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
        $directory = Directory::find($request->directory);
        $all_files = File::all()->where('user_id', Auth::id());

        $user_folder = stristr(Auth::user()['email'], '@', true);
        $file_name = $file->getClientOriginalName();

        if ($directory)
        {
            $all_files = $all_files->where('directory_id', $directory->id);
            foreach ($all_files as $all_file)
            {
                if ($file_name == $all_file->name)
                {
                    return redirect()->back()->with('error', 'Файл с таким именем уже существует');
                }
            }

            $path = $directory->path;
        } else {
            $all_files = $all_files->where('directory_id', null);
            foreach ($all_files as $all_file)
            {
                if ($file_name == $all_file->name)
                {
                    return redirect()->back()->with('error', 'Файл с таким именем уже существует');
                }
            }

            $path = 'private/'.$user_folder;
        }

        $file->storeAs($path, $file_name);

        File::create([
            'name' => $file_name,
            'path' => $path.'/'.$file_name,
            'user_id' => Auth::id(),
            'directory_id' => $request->directory,
        ]);

        return redirect()->back()->with('success', 'Файл добавлен');
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
        $all_files = File::all()->where('user_id', Auth::id());

        if ($request->directory != 0)
        {
            $all_files = $all_files->where('directory_id', $directory->id);
            $new_path = $directory->path.'/'.$file->name;
            $directory_id = $directory->id;
        } else {
            $all_files = $all_files->where('directory_id', null);
        }

        foreach ($all_files as $all_file)
        {
            if ($file->name == $all_file->name)
            {
                return redirect()->back()->with('error', 'Файл с таким именем уже существует');
            }
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
        $all_files = File::all()->where('user_id', Auth::id())->where('directory_id', $file->directory_id);

        if (!$new_name)
        {
            $new_name = $request->name;
        }

        foreach ($all_files as $all_file)
        {
            if ($new_name.$ext == $all_file->name)
            {
                return redirect()->back()->with('error', 'Файл с таким именем уже существует');
            }
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
