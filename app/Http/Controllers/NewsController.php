<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published' => true,
        ]);

        return back()->with('success', 'News article created.');
    }
    public function show(News $news)
    {
        $news->load('comments.user');

        return view('news.fullview', compact('news'));
    }

    //Show edit form
public function edit(News $news)
{
    return view('admin.edit-news', compact('news'));
}

//Update article
public function update(Request $request, News $news)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|mimes:jpg,jpeg,png,webp,gif|max:2048',
    ]);

    //Keep old image by default
    $imagePath = $news->image;

    if ($request->hasFile('image')) {

        // Delete old image
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $imagePath = $request->file('image')->store('news', 'public');
    }

    $news->update([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
    ]);

    return redirect()
        ->route('admin.news')
        ->with('success', 'News article updated.');
}

    //Delete article
    public function destroy(News $news)
    {
        $news->delete();

        return back()->with('success', 'News article deleted.');
    }
}