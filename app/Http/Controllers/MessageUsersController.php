<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;

class MessageUsersController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $userId = Auth::id();

        $messages = Message::with(['sender', 'receiver'])
            ->whereNotNull('body')
            ->where(function ($query) use ($userId, $user) {
                $query->where([
                    ['sender_id', $userId],
                    ['receiver_id', $user->id],
                ])->orWhere([
                            ['sender_id', $user->id],
                            ['receiver_id', $userId],
                        ]);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.message', compact('user', 'messages'));
    }
    public function send(Request $request, $username)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $receiver = User::where('username', $username)->firstOrFail();

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id,
            'body' => $request->message,
        ]);

        return back()->with('success', 'Message sent!');
    }
    public function inbox()
    {
        $userId = Auth::id();

        $messages = Message::with(['sender', 'receiver'])
            ->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->latest()
            ->get();

        return view('messages.inbox', compact('messages'));
    }
}