<?php

namespace App\Http\Controllers;

use App\Models\CommentsOnNews;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'message' => 'required|max:1000',
        ]);

        CommentsOnNews::create([
            'user_id' => auth()->id(),
            'news_id' => $news->id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Comment posted.');
    }
}