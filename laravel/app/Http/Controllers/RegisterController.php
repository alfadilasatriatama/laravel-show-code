<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function index() {
       return view('register.index', [
           'title' => 'Register',
           'active' => 'register'
       ]);
   }

   public function store(Request $request) {
    $validatedData = $request->validate([
        'name'=> 'required|max:255',
        // ------using array------------
        'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        'noWA' => 'required|min:7|max:20',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255'
    ]);

    // ----------hashing(encrypt password)--------------
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please Login');

        return redirect('/login')->with('success', 'Registration successfull! Please Login');

   }


}
