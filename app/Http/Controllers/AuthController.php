<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function loginAuth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with('failed', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerAuth(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:6'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration Success! Please Login!');
    }

    public function editProfile(){
        return view('profile.edit');
    }

    public function editProfileAuth(Request $request){
        $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|email:rfc,dns'
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect('/home')->with('updated', 'Profile Update Success!');
    }

}
