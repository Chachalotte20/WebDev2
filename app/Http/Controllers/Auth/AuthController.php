<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loginAuth = User::where('email', '=', $request->email)->first();
        if ($loginAuth) {
            Session::put('loginId', $loginAuth->id);
            return redirect()->route('std.index')->with('success', 'Login successfully.');
        } else {
            return redirect()->route('auth.index')->with('fail', 'Login unsuccessful.');
        }
    }

    // Register
    public function indexRegister()
    {
        return view('auth.register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect()->route('auth.index')->with('success', 'Account Created!');
    }

    public function logout()
    {
        Session::flush(); 
        return redirect()->route('auth.index')->with('success', 'You have been logged out.');
    }
}
