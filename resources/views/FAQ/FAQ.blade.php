<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">
            Frequently Asked Questions
        </h1>

        <div class="space-y-4" x-data="{ open: null }">

            <!-- General questions about service. -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="window.location.href='/FAQ_general'">
                    General information
                </button>
            </div>

            <!-- How the data is protected -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="window.location.href='/FAQ_data'">
                    Data protection
                </button>
            </div>

            <!-- Information about billing -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="window.location.href='/FAQ_safe'">
                    How to stay safe on BuddyTalks
                </button>
            </div>

            <!-- Technical issues or questions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="window.location.href='/FAQ_technical'">
                    Technical issues
                </button>
            </div>

            <div class="text-center mt-10 text-sm text-gray-500 dark:text-gray-400">
                Got questions that aren't mentioned in the FAQ? Contact support anytime.
            </div>

        </div>

</x-app-layout>