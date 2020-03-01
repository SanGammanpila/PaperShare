<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Faculty;
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

    public function show($user_id)
    {
        $user = User::find($user_id);
        return view('user.show',compact('user'));        
    }

    public function profile()
    {
    
            $userId = Auth::id();
            $user = User::find($userId);
            return view('user.profile',compact('user'));        
    }

    public function edit()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $faculties = Faculty::all();
        $universities = University::all();
        return view('user.edit_profile',compact('universities','faculties','user'));        

    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'university' => 'required',
            'faculty' => 'required',
            'profile_photo' => 'image|nullable|max:1500'
        ]);
        $path = '';
        if ($request->hasFile('profile_photo')) {

            $path = $request->file('profile_photo')->store('profile_photos','public');
        }

        //Delete the current Profile Photo

        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->university = $request->input('university');
        $user->faculty = $request->input('faculty');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->about = $request->input('about');
        $user->profile_photo = $path;

        $user->update();

        return redirect('/profile');
    }

    public function bookmarks()
    {
        
        $bookmarks = User::find(Auth::id())->bookmarks();
        //return $bookmarks;
        return view('user.bookmarks',compact('bookmarks'));        
        
    }
    
    public function myarticles()
    {
        $articles = User::find(Auth::id())->articles;
        return view('user.myarticles',compact('articles'));        
    }

    public function addBookmark($article_id)
    {
        //Add Bookmark
    }

}
