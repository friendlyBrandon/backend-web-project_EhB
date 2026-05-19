<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
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
     * Delete the user's account.
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
    public function updateProfile(string $username, Request $request)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404, "User not found.");
        }

        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'bio' => 'nullable|string',
        ]);

        // Image upload
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $extension = $image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;

            // Storage path
            $path = Storage::putFile('public/public-profiles/profile-pictures/', $image, 'public');

            $user->profile_picture_path = $path;
            $user->save();
        }

        return redirect()->route('profile.show', $username);
    }

    public function showProfile(string $username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404, "User not found.");
        }

        // Prepare data for view
        $profileData = [
            'user' => $user,
            'canEdit' => auth()->user()->id === $user->id // Check if current user can edit
        ];

        return view('profile.show', $profileData);
    }
    public function editProfile(string $username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404, "User not found.");
        }

        // Prepare data for view
        $profileData = [
            'user' => $user,
            'canEdit' => auth()->user()->id === $user->id // Check if current user can edit
        ];

        return view('profile.edit', $profileData);
    }
}
