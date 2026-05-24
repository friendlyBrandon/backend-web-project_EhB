<x-app-layout>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-10">

        <div class="bg-gray-800 rounded-2xl shadow-lg p-10 w-full max-w-md text-center text-white">

            <!-- Profile Picture -->
            @if($user->profile_pic_path)

                @php
                    $path = str_replace('public/', '', $user->profile_pic_path);
                @endphp

                <img src="{{ asset('storage/' . $path) }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-4">

            @else

                <div
                    class="w-20 h-20 rounded-full bg-gray-700 mx-auto mb-4 flex items-center justify-center text-white text-2xl">
                    {{ strtoupper(substr($user->username, 0, 1)) }}
                </div>

            @endif

            <!-- Username -->
            <h1 class="text-2xl font-bold mb-2">
                {{ $user->username }}
            </h1>

            @if($user->birthday)
                <div class="mt-4">
                    <h3 class="font-semibold">Birthday</h3>

                    <p>
                        {{ $user->birthday->format('F d, Y') }}
                    </p>
                </div>
            @endif

            <!-- Bio -->
            <p class="text-gray-300 mb-6">
                {{ $user->bio ?? 'No bio available yet.' }}
            </p>

            <!-- Intrests -->
            @if(!empty($user->interests))
                <div class="mt-6">

                    <h3 class="text-sm text-gray-300 mb-2">
                        Interests
                    </h3>

                    <div class="flex flex-wrap justify-center gap-2">

                        @foreach($user->interests as $interest)

                            <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full">
                                {{ $interest }}
                            </span>

                        @endforeach

                    </div>

                </div>
            @endif


            <!-- Message user -->
        </div>

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