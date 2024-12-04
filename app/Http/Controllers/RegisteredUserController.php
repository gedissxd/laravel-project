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
        Auth::login($user);
        return redirect('/products');
    }
}
