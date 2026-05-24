<x-app-layout>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-10">

        <div class="max-w-6xl mx-auto px-6">

            <h1 class="text-3xl font-bold text-white mb-8 text-center">
                All Profiles
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($users as $user)

                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6 text-white text-center">

                        <!-- Profile Picture -->
                        @if($user->profile_pic_path)

                            <img src="{{ Storage::url($user->profile_pic_path) }}" alt="{{ $user->username }}"
                                class="w-20 h-20 rounded-full object-cover mx-auto mb-4">

                        @else

                            <div
                                class="w-20 h-20 rounded-full bg-gray-700 mx-auto mb-4 flex items-center justify-center text-white text-2xl">
                                {{ strtoupper(substr($user->username, 0, 1)) }}
                            </div>

                        @endif

                        <!-- Username -->
                        <h2 class="text-xl font-bold mb-2">
                            {{ $user->username }}
                        </h2>

                        @if($user->birthday)
                            <div class="mt-4">
                                <h3 class="font-semibold">Birthday</h3>

                                <p>
                                    {{ $user->birthday->format('F d, Y') }}
                                </p>
                            </div>
                        @endif

                        <!-- Bio -->
                        <p class="text-gray-300 text-sm mb-4">
                            {{ $user->bio ?? 'No bio available yet.' }}
                        </p>

                        <!-- Interests -->
                        @if(!empty($user->interests))

                            <div class="flex flex-wrap justify-center gap-2 mb-4">

                                @foreach($user->interests as $interest)

                                    <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full">
                                        {{ $interest }}
                                    </span>

                                @endforeach

                            </div>

                        @endif

                        @if(auth()->id() !== $user->id)

                            <a href="{{ route('messages.message', $user->username) }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition">
                                Message {{ $user->username }}
                            </a>

                        @else

                            <span
                                class="inline-block bg-gray-700 text-gray-400 text-sm px-4 py-2 rounded-lg cursor-not-allowed">
                                This is you
                            </span>

                        @endif

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</x-app-layout>