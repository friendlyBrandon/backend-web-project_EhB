<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Welcome to BuddyTalks- Find Your Buddies!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4 bg-white shadow-md">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Register
                    </a>
                    <a href="{{ route('profiles.view') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Profile discovery
                    </a>
                @endif
            @endauth
        </nav>
    @endif

    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Welcome to ConnectMe!</h1>
        <p class="text-lg text-gray-700 text-center mb-6">
            BuddyTalks is a platform designed to help you meet new people with shared interests.  Whether you're looking for a hiking buddy, a gaming partner, or simply someone to chat with, we can help you find your tribe.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Discover Groups</h2>
                <p class="text-gray-700">Browse a wide range of groups based on your hobbies and passions.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Easy Matching</h2>
                <p class="text-gray-700">Our intelligent matching algorithm suggests people you might connect with.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html
