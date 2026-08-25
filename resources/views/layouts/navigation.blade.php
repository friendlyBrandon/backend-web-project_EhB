<nav x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">

    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="h-9 w-auto text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Desktop Links -->
                <div class="hidden sm:flex sm:ms-10 sm:space-x-8">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link
                        :href="route('profiles.view')"
                        :active="request()->routeIs('profiles.view')">
                        Public profiles
                    </x-nav-link>

                    <x-nav-link
                        :href="route('messages.inbox')"
                        :active="request()->routeIs('messages.inbox')">
                        Inbox
                    </x-nav-link>

                    <x-nav-link
                        :href="route('news')"
                        :active="request()->routeIs('news')">
                        News
                    </x-nav-link>

                    <x-nav-link
                        :href="route('faq')"
                        :active="request()->routeIs('faq')">
                        FAQ
                    </x-nav-link>

                    <x-nav-link
                        :href="route('contact')"
                        :active="request()->routeIs('contact')">
                        Contact
                    </x-nav-link>
                </div>
            </div>

            <!-- Desktop Right -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth
                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">
                            <button
                                type="button"
                                class="inline-flex items-center gap-2 px-3 py-2
                                       text-sm font-medium text-gray-500
                                       dark:text-gray-300
                                       hover:text-gray-700 dark:hover:text-gray-100
                                       focus:outline-none transition">

                                <span>{{ auth()->user()->name }}</span>

                                <svg
                                    class="w-4 h-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            @if(auth()->user()->is_admin == 1)

                                <x-dropdown-link :href="route('admin.admin_page')">
                                    Admin Panel
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('admin.news')">
                                    Manage News
                                </x-dropdown-link>

                                <x-dropdown-link
                                    :href="route('admin.support-forums')"
                                    :active="request()->routeIs('admin.support-forums')">
                                    Support Forums
                                </x-dropdown-link>

                                <x-dropdown-link
                                    :href="route('admin.faqs.index')"
                                    :active="request()->routeIs('admin.faqs.index')">
                                    Edit FAQs
                                </x-dropdown-link>

                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>

                        </x-slot>
                    </x-dropdown>

                @else

                    <div class="flex items-center gap-4">
                        <a
                            href="{{ route('login') }}"
                            class="text-sm text-gray-500 dark:text-gray-300
                                   hover:text-gray-700 dark:hover:text-white">
                            Login
                        </a>

                        <a
                            href="{{ route('register') }}"
                            class="text-sm text-gray-500 dark:text-gray-300
                                   hover:text-gray-700 dark:hover:text-white">
                            Register
                        </a>
                    </div>

                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">

                <button
                    @click="open = !open"
                    type="button"
                    class="inline-flex items-center justify-center
                           rounded-md p-2
                           text-gray-500 dark:text-gray-400
                           hover:bg-gray-100 dark:hover:bg-gray-700
                           hover:text-gray-700 dark:hover:text-gray-200
                           focus:outline-none focus:ring-2
                           focus:ring-indigo-500 transition"
                    :aria-expanded="open"
                    aria-controls="mobile-menu">

                    <!-- Menu icon -->
                    <svg
                        x-show="!open"
                        x-cloak
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <!-- Close icon -->
                    <svg
                        x-show="open"
                        x-cloak
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    <span class="sr-only">
                        Toggle navigation menu
                    </span>
                </button>

            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        id="mobile-menu"
        x-show="open"
        x-cloak
        x-transition
        class="sm:hidden border-t border-gray-100 dark:border-gray-700"
    >

        <div class="px-4 pt-3 pb-4 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('profiles.view')"
                :active="request()->routeIs('profiles.view')">
                Public profiles
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('messages.inbox')"
                :active="request()->routeIs('messages.inbox')">
                Inbox
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('news')"
                :active="request()->routeIs('news')">
                News
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('faq')"
                :active="request()->routeIs('faq')">
                FAQ
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('contact')"
                :active="request()->routeIs('contact')">
                Contact
            </x-responsive-nav-link>

        </div>

        <!-- Mobile Account Section -->
        @auth
            <div class="border-t border-gray-100 dark:border-gray-700 px-4 py-4">

                <div class="mb-3">
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200">
                        {{ auth()->user()->name }}
                    </div>

                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ auth()->user()->email }}
                    </div>
                </div>

                <div class="space-y-1">

                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profile
                    </x-responsive-nav-link>

                    @if(auth()->user()->is_admin == 1)

                        <x-responsive-nav-link :href="route('admin.admin_page')">
                            Admin Panel
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('admin.news')">
                            Manage News
                        </x-responsive-nav-link>

                        <x-responsive-nav-link
                            :href="route('admin.support-forums')"
                            :active="request()->routeIs('admin.support-forums')">
                            Support Forums
                        </x-responsive-nav-link>

                        <x-responsive-nav-link
                            :href="route('admin.faqs.index')"
                            :active="request()->routeIs('admin.faqs.index')">
                            Edit FAQs
                        </x-responsive-nav-link>

                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link
                            :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-responsive-nav-link>
                    </form>

                </div>
            </div>

        @else

            <div class="border-t border-gray-100 dark:border-gray-700 px-4 py-4">
                <div class="flex flex-col gap-2">

                    <a
                        href="{{ route('login') }}"
                        class="w-full rounded-md px-4 py-2 text-sm
                               text-gray-600 dark:text-gray-300
                               hover:bg-gray-100 dark:hover:bg-gray-700">
                        Login
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="w-full rounded-md px-4 py-2 text-sm
                               text-gray-600 dark:text-gray-300
                               hover:bg-gray-100 dark:hover:bg-gray-700">
                        Register
                    </a>

                </div>
            </div>

        @endauth

    </div>
</nav>