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

        //Mark only messages sent by user to logged-in user as read
        Message::where('sender_id', $user->id)
            ->where('receiver_id', $userId)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
            ]);

        //Only retrieve messages between the logged-in user and selected user
        $messages = Message::with(['sender', 'receiver'])
            ->whereNotNull('body')
            ->where(function ($query) use ($userId, $user) {
                $query->where(function ($query) use ($userId, $user) {
                    $query->where('sender_id', $userId)
                        ->where('receiver_id', $user->id);
                })
                ->orWhere(function ($query) use ($userId, $user) {
                    $query->where('sender_id', $user->id)
                        ->where('receiver_id', $userId);
                });
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
            'sender_id' => Auth::id(),
            'receiver_id' => $receiver->id,
            'body' => $request->message,
            'is_read' => false,
        ]);

        return back()->with('success', 'Message sent!');
    }

    public function inbox()
    {
        $userId = Auth::id();

        //Only show unread messages where the logged-in user is receiver
        $messages = Message::with(['sender', 'receiver'])
            ->where('receiver_id', $userId)
            ->where('is_read', false)
            ->latest()
            ->get();

        return view('messages.inbox', compact('messages'));
    }
}