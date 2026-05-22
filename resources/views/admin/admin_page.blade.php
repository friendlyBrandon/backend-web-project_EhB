<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 min-h-screen text-white">
    @include('layouts.navigation')
    <!-- Header -->
    <div class="bg-gray-800 border-b border-gray-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

            <div>
                <h1 class="text-3xl font-bold">
                    Admin Dashboard
                </h1>

                <p class="text-gray-400 mt-1">
                    Manage user permissions
                </p>
            </div>

            <a href="{{ route('dashboard') }}"
                class="bg-blue-600 hover:bg-blue-700 px-5 py-2 rounded-lg font-semibold transition">
                Dashboard
            </a>

        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-6">

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-lg mb-6 shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded-lg mb-6 shadow-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- User Table -->
        <div class="bg-gray-800 rounded-2xl overflow-hidden shadow-2xl border border-gray-700">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <!-- Table Header -->
                    <thead class="bg-gray-700">
                        <tr>

                            <th class="text-left px-6 py-4 uppercase tracking-wider text-sm">
                                Username
                            </th>

                            <th class="text-left px-6 py-4 uppercase tracking-wider text-sm">
                                Email
                            </th>

                            <th class="text-left px-6 py-4 uppercase tracking-wider text-sm">
                                Role
                            </th>

                            <th class="text-right px-6 py-4 uppercase tracking-wider text-sm">
                                Actions
                            </th>

                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="divide-y divide-gray-700">

                        @foreach($users as $user)

                            <tr class="hover:bg-gray-750 transition duration-200">

                                <!-- Username -->
                                <td class="px-6 py-5 font-medium">
                                    {{ $user->username ?? 'N/A' }}
                                </td>

                                <!-- Email -->
                                <td class="px-6 py-5 text-gray-300">
                                    {{ $user->email }}
                                </td>

                                <!-- Role -->
                                <td class="px-6 py-5">

                                    @if($user->is_admin)

                                        <span
                                            class="bg-green-500/20 text-green-400 border border-green-500/30 px-3 py-1 rounded-full text-sm font-semibold">
                                            Admin
                                        </span>

                                    @else

                                        <span class="bg-gray-600 text-gray-200 px-3 py-1 rounded-full text-sm font-semibold">
                                            User
                                        </span>

                                    @endif

                                </td>

                                <!-- Action -->
                                <td class="px-6 py-5 text-right">

                                    {{-- Prevent changing yourself --}}
                                    @if(auth()->id() === $user->id)

                                        <span class="text-gray-500 italic">
                                            You
                                        </span>

                                    @else

                                        <form action="{{ route('admin.toggle', $user->id) }}" method="POST">

                                            @csrf

                                            @if($user->is_admin)

                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg font-semibold transition shadow-md">
                                                    Remove Admin
                                                </button>

                                            @else

                                                <button type="submit"
                                                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-semibold transition shadow-md">
                                                    Make Admin
                                                </button>

                                            @endif

                                        </form>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>