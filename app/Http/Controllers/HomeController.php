<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function guestHome(){
        return view('homepage.home');
    }

    public function adminHome(){
        return view('homepage.admin');
    }

    public function userHome(){
        return view('homepage.user');
    }
}
