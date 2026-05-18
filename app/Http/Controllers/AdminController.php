<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all users by creation date
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.admin_page', compact('users'));
    }
    public function toggleAdmin($id)
    {
        $user = User::findOrFail($id);

        // Prevent current user from removing their own admin right
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot remove your own admin status.');
        }

        // If is_admin = 0 means not admin
        $user->is_admin = !$user->is_admin;
        $user->save();

        return back()->with('success', 'User role updated successfully.');
    }
}   