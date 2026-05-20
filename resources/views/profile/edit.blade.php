<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Edit Profile
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-900 py-12 px-4">

        <div class="max-w-4xl mx-auto space-y-8">

            <!-- Breeze Profile Settings -->
            <div class="bg-gray-800 shadow-xl rounded-2xl p-6">

                <div class="max-w-xl text-white">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </div>

            <!-- Password -->
            <div class="bg-gray-800 shadow-xl rounded-2xl p-6">

                <div class="max-w-xl text-white">
                    @include('profile.partials.update-password-form')
                </div>

            </div>

            <!-- Delete Account -->
            <div class="bg-gray-800 shadow-xl rounded-2xl p-6">

                <div class="max-w-xl text-white">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

            <!-- Public Profile -->
            <div class="bg-gray-800 shadow-xl rounded-2xl p-8 text-white">

                <h2 class="text-2xl font-bold mb-6">
                    Public Profile
                </h2>

                <form method="POST"
                      action="{{ route('profile.update.public', $user->username) }}"
                      enctype="multipart/form-data"
                      class="space-y-6">

                    @csrf

                    <!-- Username -->
                    <div>

                        <label class="block text-sm text-gray-300 mb-2">
                            Username
                        </label>

                        <input type="text"
                               name="username"
                               value="{{ old('username', $user->username) }}"
                               class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- Email -->
                    <div>

                        <label class="block text-sm text-gray-300 mb-2">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- Bio -->
                    <div>

                        <label class="block text-sm text-gray-300 mb-2">
                            Bio
                        </label>

                        <textarea name="bio"
                                  rows="4"
                                  class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('bio', $user->bio) }}</textarea>

                    </div>

                    <!-- Profile Picture -->
                    <div>

                        <label class="block text-sm text-gray-300 mb-2">
                            Profile Picture
                        </label>
                        //Stored in storage\app\public\profile-pictures

                        <input type="file"
                               name="profile_picture"
                               class="w-full text-sm text-gray-300">

                    </div>

                    <!-- Interests -->
                    <div>

                        <label class="block text-sm text-gray-300 mb-3">
                            Interests
                        </label>

                        @php
                            $allInterests = [
                                'Gaming',
                                'Coding',
                                'Music',
                                'Movies',
                                'Anime',
                                'Fitness',
                                'Travel',
                                'Photography',
                                'Sports',
                                'Art'
                            ];
                        @endphp

                        <div class="flex flex-wrap gap-3">

                            @foreach($allInterests as $interest)

                                <label class="flex items-center gap-2 bg-gray-700 px-4 py-2 rounded-xl cursor-pointer hover:bg-gray-600 transition">

                                    <input type="checkbox"
                                           name="interests[]"
                                           value="{{ $interest }}"
                                           {{ in_array($interest, $user->interests ?? []) ? 'checked' : '' }}>

                                    <span class="text-sm">
                                        {{ $interest }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </div>

                    <!-- Submit -->
                    <div>

                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 transition px-6 py-3 rounded-xl font-semibold">
                            Update Public Profile
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>