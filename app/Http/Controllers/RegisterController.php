<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:4', 'max:128'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'digits:9', 'numeric'],
            'password' => ['required', Password::defaults(), 'confirmed']
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/');
    }
}
