<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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

        if ($request->has('remember')){
            Cookie::queue('email', $request->email, 30);
            Cookie::queue('password', $request->password, 30);
        }

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

        return redirect('/login');
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

    public function changePassword(){
        return view('profile.password');
    }

    public function changePasswordAuth(Request $request){
        $request->validate([
            'password' => 'min:6|required',
            'newPassword' => 'min:6|required_with:confirmNewPassword|same:confirmNewPassword',
            'confirmNewPassword' => 'min:6|required'
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        $user->update([
            'password' => Hash::make($request->newPassword)
        ]);

        return redirect('/home')->with('changed', 'Your Password Has Been Changed!');
    }

}
