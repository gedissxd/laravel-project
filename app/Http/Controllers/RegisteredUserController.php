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
    public function store()
    {
        $validated = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'confirmed', 'unique:users,email'],
            'password' => ['required'],
            'maker_name' => ['required']
        ]);
        $user = User::create($validated);

        $user->maker()->create([
            'name' => $validated['maker_name'],
            'user_id' => $user->id
        ]);
        Auth::login($user);
        return redirect('/products');
    }
}
