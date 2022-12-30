<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    // public function guestHome(){
    //     return view('homepage.home');
    // }

    // public function adminHome(){
    //     return view('homepage.admin');
    // }

    // public function userHome(){
    //     return view('homepage.user');
    // }
}
