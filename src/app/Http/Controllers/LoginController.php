<?php

namespace App\Http\Controllers;

use App\Models\AdminUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registration(LoginRequest $request)
    {
        AdminUsers::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect()->route('login');
    }

    public function store(LoginRequest $request)
    {
        $login = $request->only(['content']);
        AdminUsers::create($login);

        return redirect('/login');
    }
}
