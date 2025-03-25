<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('users.register');
    }
    
    public function create(Request $request){
        $validatedData = $request->validate([                       
            'name' => 'required|max:255',
            'last_education' => 'required|max:255',
            'position' => 'required|max:255',
            'email' => 'required|max:400',
            'password' => 'required|min:6',
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        $userData = [
            'name' => $validatedData['name'],
            'last_education' => $validatedData['last_education'],
            'position' => $validatedData['position'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

        User::create($userData);

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
