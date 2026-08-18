<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">
            Frequently Asked Questions about Staying Safe on BuddyTalks
        </h1>

        <div class="space-y-4" x-data="{ open: null }">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 1 ? null : 1">
                    How can I stay safe when talking to someone new?
                </button>
                <div x-show="open === 1" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Take your time getting to know people and trust your instincts. Avoid sharing sensitive information
                    such
                    as your home address, passwords, financial details, or other private information.
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 2 ? null : 2">
                    Is it safe to meet someone I connected with in person?
                </button>
                <div x-show="open === 2" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    If you decide to meet someone, take precautions. Meet in a busy public place, tell a friend or
                    family
                    member where you're going, arrange your own transportation, and consider keeping your first meeting
                    relatively short.
                </div>
            </div>

</x-app-layout>