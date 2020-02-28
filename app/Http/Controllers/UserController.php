<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function index()
    // {
    //     return User::find(5);
    // }

    public function show()
    {
        return view('user.show');        

    }

    public function profile()
    {
        if (Auth::check())
        {
            $userId = Auth::id();
            $user = User::find($userId);
            return view('user.profile',compact('user'));        
        }
        return redirect('/login');
    }

    public function edit()
    {
        return view('user.edit_profile');        

    }

    public function bookmarks()
    {
        return view('user.bookmarks');        

    }

    public function mypapers()
    {
        return view('user.mypapers');        

    }

}
