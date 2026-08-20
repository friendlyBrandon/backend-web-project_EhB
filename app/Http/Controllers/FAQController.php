<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display FAQs for the public FAQ pages.
     */
    public function index()
    {
        $faqs = Faq::orderBy('created_at')->get();

        return view('FAQ.FAQ', compact('faqs'));
    }

    /**
     * Show the admin FAQ management page.
     */
    public function adminIndex()
    {
        abort_unless(auth()->user()?->is_admin, 403);

        $faqs = Faq::orderBy('category')
            ->orderBy('created_at')
            ->get();

        return view('admin.faqs.index', compact('faqs'));
        ;
    }

    /**
     * Show the create FAQ form.
     */
    public function create()
    {
        abort_unless(auth()->user()?->is_admin, 403);

        return view('admin.faqs.create');
    }

    /**
     * Store a new FAQ.
     */
    public function store(Request $request)
    {
        abort_unless(auth()->user()?->is_admin, 403);

        $validated = $request->validate([
            'category' => ['required', 'in:general,data,safe,technical'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        Faq::create($validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    /**
     * Show the edit FAQ form.
     */
    public function edit(Faq $faq)
    {
        abort_unless(auth()->user()?->is_admin, 403);

        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update an FAQ.
     */
    public function update(Request $request, Faq $faq)
    {
        abort_unless(auth()->user()?->is_admin, 403);

        $validated = $request->validate([
            'category' => ['required', 'in:general,data,safe,technical'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        $faq->update($validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    /**
     * Delete an FAQ.
     */
    public function destroy(Faq $faq)
    {
        abort_unless(auth()->user()?->is_admin, 403);

        $faq->delete();

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }
    public function general()
    {
        $faqs = Faq::where('category', 'general')
            ->orderBy('created_at')
            ->get();

        return view('FAQ.FAQ_general', compact('faqs'));
    }

    public function data()
    {
        $faqs = Faq::where('category', 'data')
            ->orderBy('created_at')
            ->get();

        return view('FAQ.FAQ_data', compact('faqs'));
    }

    public function safe()
    {
        $faqs = Faq::where('category', 'safe')
            ->orderBy('created_at')
            ->get();

        return view('FAQ.FAQ_safe', compact('faqs'));
    }

    public function technical()
    {
        $faqs = Faq::where('category', 'technical')
            ->orderBy('created_at')
            ->get();

        return view('FAQ.FAQ_technical', compact('faqs'));
    }
}