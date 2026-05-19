<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Default Breeze profile edit page
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Default Breeze update profile (authenticated user)
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete account
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Show public profile by username
     */
    public function showProfile(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('profile.show', [
            'user' => $user,
            'canEdit' => auth()->check() && auth()->id() === $user->id
        ]);
    }

    /**
     * Edit public profile page
     */
    public function editProfile(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        // Security: only owner can edit
        abort_if(auth()->id() !== $user->id, 403);

        return view('profile.edit', [
            'user' => $user,
            'canEdit' => true
        ]);
    }

    /**
     * Update public profile (username, bio, picture)
     */
    public function updateProfile(string $username, Request $request)
    {
        $user = User::where('username', $username)->firstOrFail();

        // Security: only owner can update
        abort_if(auth()->id() !== $user->id, 403);

        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string',
        ]);

        $user->fill($validatedData);

        // Profile picture upload
        if ($request->hasFile('profile_picture')) {

            $image = $request->file('profile_picture');

            $path = $image->store('public/public-profiles/profile-pictures');

            // IMPORTANT: matches your migration column
            $user->profile_pic_path = $path;
        }

        $user->save();

        return redirect()->route('profile.show', $user->username);
    }
}