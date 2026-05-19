<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchBarController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('username');

        if (!$searchTerm) {
            return view('welcome');
        }

        $users = User::where('username', 'like', '%' . $searchTerm . '%')->get();

        return view('profile.search', compact('users', 'searchTerm'));
    }
}