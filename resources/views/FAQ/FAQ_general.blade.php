<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">
            Frequently Asked Questions for General information
        </h1>

        <div class="space-y-4" x-data="{ open: null }">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 1 ? null : 1">
                    What is BuddyTalks?
                </button>
                <div x-show="open === 1" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    BuddyTalks is a platform that helps you meet new people who share your interests. Whether you want
                    to find a hiking buddy, gaming partner, or someone to chat with, BuddyTalks helps you connect with
                    your tribe.
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 2 ? null : 2">
                    How does BuddyTalks work?
                </button>
                <div x-show="open === 2" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Simply create a profile, share your interests, and discover people who have things in common with
                    you. From there, you can start a conversation and see where the connection takes you.
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 3 ? null : 3">
                    Is this platform free?
                </button>
                <div x-show="open === 3" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Yes, the platform is completely free to use. Premium features may be added in the future.
                </div>
            </div>

</x-app-layout>