<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecycleController extends Controller
{
    public function index()
    {
        $directories = Directory::all()->where('directory_id', null)->where('user_id', Auth::id());
        $files = File::onlyTrashed()->get();
        $users = User::all();

        return \response()->view('contents.pages.recycle', compact([
            'files',
            'directories',
            'users',
        ]));
    }

    public function restore($file)
    {
        $file = File::withTrashed()->findOrFail($file);
        $restore_folder = 'private'.stristr($file->path, '/');
        Storage::move($file->path, $restore_folder);
        $file->update([
            'path' => $restore_folder
        ]);
        $file->restore();

        return redirect()->back();
    }

    public function destroy($file)
    {

        $file = File::withTrashed()->findOrFail($file);
        $file->forceDelete();
        Storage::delete($file->path);

        return redirect()->back();
    }
}
