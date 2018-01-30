<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categories()
    {
        return view('Categories.categories');
    }

    public function logged()                                    //check if a user is logged in
    {
        return response()->json(['isLoggedIn' =>  Auth::check()]);
    }
}
