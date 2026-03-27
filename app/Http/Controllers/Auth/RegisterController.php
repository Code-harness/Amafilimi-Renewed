<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => generateUserName($request->email),
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect()->route('landing');
    }
}
