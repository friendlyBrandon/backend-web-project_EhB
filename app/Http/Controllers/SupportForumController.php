<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportForum;

class SupportForumController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        SupportForum::create($validated);

        return back()->with('success', 'Message sent successfully!');
    }

    public function index()
    {
        $forums = SupportForum::latest()->get();

        return view('admin.SupportForums', compact('forums'));
    }
}