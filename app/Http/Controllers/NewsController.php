<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //News page
    public function index()
    {
        $news = News::where('published', true)
            ->latest()
            ->get();

        return view('news.news', compact('news'));
    }

    public function admin()
    {
        $news = News::latest()->get();

        return view('admin.news', compact('news'));
    }

    //Store article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'published' => true,
        ]);

        return back()->with('success', 'News article created.');
    }
    public function show(News $news)
    {
        $news->load('comments.user');

        return view('news.fullview', compact('news'));
    }

    //Delete article
    public function destroy(News $news)
    {
        $news->delete();

        return back()->with('success', 'News article deleted.');
    }
}