<x-app-layout>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-10">

        <!-- Card -->
        <div class="bg-gray-800 rounded-2xl shadow-lg p-10 w-full max-w-md text-center">

            <h1 class="text-3xl font-bold text-white mb-8">
                Welcome back!
            </h1>

            <!-- User Info -->
            <div class="space-y-6 text-white">

                <div>
                    <p class="text-gray-300 text-sm uppercase tracking-wide">
                        Username
                    </p>
                    <p class="text-xl font-semibold">
                        {{ $user->name }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-300 text-sm uppercase tracking-wide">
                        Email
                    </p>
                    <p class="text-lg font-medium break-all">
                        {{ $user->email }}
                    </p>
                </div>

            </div>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf

                <button class="bg-red-600 hover:bg-red-700 text-white text-sm px-5 py-2 rounded-lg transition">
                    Logout
                </button>

            </form>

        </div>

    </div>

</x-app-layout>