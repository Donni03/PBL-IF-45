<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.add_rooms');
    }
    public function user(){
        return view('users.home');
    }
    public function admin()
    {
        return view('users.dashboard');
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
