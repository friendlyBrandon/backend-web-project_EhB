<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">
            Frequently Asked Questions
        </h1>

        <div class="space-y-4" x-data="{ open: null }">

            <!-- 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 1 ? null : 1">
                    What should I do if the website doesn't load on my home network?
                </button>
                <div x-show="open === 1" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Contact your Internet Service Provider (company that supplies your network) and kindly ask if there
                    are any technical issues on their end.
                </div>
            </div>
        </div>

</x-app-layout>