<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">
            Frequently Asked Questions about Staying Safe on BuddyTalks
        </h1>

        <div class="space-y-4" x-data="{ open: null }">

            @forelse ($faqs as $faq)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow">

                    <button
                        class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                        @click="open = open === {{ $faq->id }} ? null : {{ $faq->id }}"
                    >
                        {{ $faq->question }}
                    </button>

                    <div
                        x-show="open === {{ $faq->id }}"
                        class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300"
                    >
                        {{ $faq->answer }}
                    </div>

                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-5">
                    <p class="text-gray-700 dark:text-gray-300 text-center">
                        There are currently no FAQs in this category.
                    </p>
                </div>
            @endforelse

        </div>

    </div>

</x-app-layout>