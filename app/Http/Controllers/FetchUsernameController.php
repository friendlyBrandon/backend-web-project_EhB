<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FetchUsernameController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        //In case someone accesses this without logging in
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Pass the user object to the view
        return view('public-profiles.public-profiles', compact('user')); 
    }
}