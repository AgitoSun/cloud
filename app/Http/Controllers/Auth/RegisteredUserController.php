<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('contents.pages.admin.users', compact([
            'users'
        ]));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'is_admin' => ['boolean']
        ]);

        $is_admin = $request->is_admin ? $request->is_admin : 0;

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'is_admin' => $is_admin,
            'user_id' => $user->id,
        ]);

        Setting::create([
           'user_id' => $user->id,
        ]);

//        event(new Registered($user));

        return redirect()->back();
    }
}
