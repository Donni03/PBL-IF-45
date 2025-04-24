<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profil()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }
    public function index()
    {
        return view('admin.add_rooms');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        return view('about');
    }
}
