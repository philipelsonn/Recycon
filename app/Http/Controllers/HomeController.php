<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('/home');
    }

    public function home(){

        return view('home');
    }
}
