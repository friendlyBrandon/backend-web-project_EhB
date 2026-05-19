<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('profile.update', ['username' => $user->username]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ $user->username }}">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}">

        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio">{{ $user->bio }}</textarea>

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture">

        <button type="submit">Update Profile</button>
    </form>

    <x-dropdown-link :href="route('profile.edit', ['username' => auth()->user()->username])">
    {{ __('Profile') }}
</x-dropdown-link>
</x-app-layout>
