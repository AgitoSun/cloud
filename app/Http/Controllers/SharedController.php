<?php

namespace App\Http\Controllers;

use App\Mail\SharedOpenMail;
use App\Models\File;
use App\Models\Shared;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SharedController extends Controller
{
    public function index()
    {
        $files = File::all()->where('user_id', Auth::id())->where('shared_id', !null);

        return \response()->view('contents.pages.shared', compact([
            'files',
        ]));
    }

    public function open(File $file)
    {
        if (!$file->shared)
        {
            $key = Str::random(16);
            $password = Str::password(16, true, true, false, false);

            $shared = Shared::create([
                'key' => $key,
                'password' => Hash::make($password)
            ]);

            $file->update([
                'shared_id' => $shared->id
            ]);

            Mail::to(Auth::user()->email)->send(new SharedOpenMail($password, $file->name));
        }

        return redirect()->back();
    }

    public function close(File $file)
    {
        $file->shared->delete();

        return redirect()->back();
    }

    public function auth(Request $request)
    {
        $shared_key = $request->shared;

        return \response()->view('contents.pages.shared-auth', compact([
            'shared_key',
        ]));
    }

    public function download(Request $request)
    {
        $shared = Shared::all()->firstOrFail('key', $request->shared);

        if (isset($shared))
        {
            if (Hash::check($request->password, $shared->password) && Storage::exists($shared->file->path))
            {
                $path = Storage::disk('local')->path($shared->file->path);

                return response()->download($path, basename($path));
            }
        }


        return redirect()->back();
    }
}
