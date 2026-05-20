<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex">

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="h-9 w-auto text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Desktop Links -->
                <div class="hidden sm:flex sm:ms-10 space-x-8">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('profiles.view')" :active="request()->routeIs('profiles.view')">
                        Public profiles
                    </x-nav-link>

                    <x-nav-link :href="route('faq')" :active="request()->routeIs('faq')">
                        FAQ
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        Contact
                    </x-nav-link>

                </div>
            </div>

            <!-- Right -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

    @auth

        <x-dropdown align="right" width="48">

            <x-slot name="trigger">
                <button class="px-3 py-2 text-sm text-gray-500 dark:text-gray-300">
                    {{ auth()->user()->name }}
                </button>
            </x-slot>

            <x-slot name="content">

                <x-dropdown-link :href="route('profile.edit')">
                    Profile
                </x-dropdown-link>

                @auth
    @if(auth()->user()->is_admin == 1)
        <x-dropdown-link :href="route('admin.admin_page')">
            Admin Panel
        </x-dropdown-link>
    @endif
@endauth



                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-dropdown-link>

                </form>

            </x-slot>

        </x-dropdown>

    @else

        <div class="flex space-x-3">
            <a href="{{ route('login') }}" class="text-sm text-gray-500">Login</a>
           &emsp;
            <a href="{{ route('register') }}" class="text-sm text-gray-500">Register</a>
        </div>

    @endauth

</div>

            <!-- Mobile Button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open" class="p-2 text-gray-500">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden px-4 pb-3">

        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('faq')" :active="request()->routeIs('faq')">
            FAQ
        </x-responsive-nav-link>
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
    Contact
</x-nav-link>

    </div>

</nav>