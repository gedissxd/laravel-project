<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'confirmed', 'unique:users,email'],
            'password' => ['required' , Password::min(6)],

        ]);
        $makerAttributes = $request->validate([
            'name' => ['required'],
        ]);

        $user = User::create($userAttributes);

        $user->maker()->create($makerAttributes);

        Auth::login($user);

        return redirect('/products');
    }
}
