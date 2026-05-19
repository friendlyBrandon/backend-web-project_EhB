<x-app-layout>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-10">

        <div class="bg-gray-800 rounded-2xl shadow-lg p-10 w-full max-w-md text-center text-white">

            <!-- Profile Picture -->
            @if($user->profile_pic_path)
                <img src="{{ Storage::url($user->profile_pic_path) }}"
                     alt="{{ $user->username }} Profile Picture"
                     class="mx-auto w-24 h-24 rounded-full object-cover mb-4">
            @endif

            <!-- Username -->
            <h1 class="text-2xl font-bold mb-2">
                {{ $user->username }}
            </h1>

            <!-- Bio -->
            <p class="text-gray-300 mb-6">
                {{ $user->bio ?? 'No bio available yet.' }}
            </p>

            <!-- Email (optional, remove if public) -->
            <p class="text-sm text-gray-400 mb-6">
                {{ $user->email }}
            </p>

            <!-- Edit Button -->
            @if($canEdit)
                <a href="{{ route('profile.edit.user', $user->username) }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-5 py-2 rounded-lg">
                    Edit Profile
                </a>
            @endif

        </div>

    </div>

</x-app-layout>