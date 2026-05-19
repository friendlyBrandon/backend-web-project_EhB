<?php

namespace App\Http\Controllers;

use App\Models\User; // Don't forget to import the User model
use Illuminate\Http\Request;

class FetchAllAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all users
        $users = User::all();

        // Pass them to the view
        return view('public-profiles.public-profiles', compact('users'));
    }
}