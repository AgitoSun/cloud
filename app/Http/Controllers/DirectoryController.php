<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DirectoryController extends Controller
{
    public function show(Directory $directory)
    {
        if ($directory->user_id !== Auth::id()) {
            return abort(404);
        }

        $directories = Directory::all()->where('directory_id', $directory->id);
        $files = File::all()->where('directory_id', $directory->id);

        return \response()->view('contents.pages.files', compact([
            'files',
            'directories',
            'directory',
        ]));
    }

    public function store(Request $request)
    {
        $directories = Directory::all();
        $directory = $directories->find($request->directory);

        $user_folder = stristr(Auth::user()['email'], '@', true);
        if ($directory)
        {
            $path = $directory->path.'/'.$request->name;
        } else {
            $path = 'private/'.$user_folder.'/'.$request->name;
        }


        Storage::makeDirectory($path);

        Directory::create([
            'name' => $request->name,
            'path' => $path,
            'directory_id' => $request->directory,
            'user_id' => Auth::id()
        ]);

        return redirect()->back();
    }

    public function rename(Request $request, Directory $directory)
    {
        $new_path = stristr($directory->path, $directory->name, true).$request->name;

        Storage::move($directory->path, $new_path);

        $directory->update([
            'name' => $request->name,
            'path' => $new_path
        ]);

        return redirect()->back();
    }

    public function destroy(Directory $directory)
    {
        $directories = Directory::all()->where('directory_id', $directory->id);
        $files = File::all()->where('directory_id', $directory->id);


        if (!$files->isEmpty() || !$directories->isEmpty())
        {
            $type = 'error';
            $message = 'Папка '.$directory->name.' не пуста';
        } else {
            Storage::deleteDirectory($directory->path);
            $directory->delete();
            $type = 'success';
            $message = 'Папка '.$directory->name.' удалена';
        }

        return redirect()->back()->with($type, $message);
    }
}
