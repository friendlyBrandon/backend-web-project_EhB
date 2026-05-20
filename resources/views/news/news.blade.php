<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">
            Latest News
        </h1>

        <div class="space-y-6">

            @forelse($news as $article)

                <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6">

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $article->title }}
                    </h2>

                    <p class="mt-4 text-gray-700 dark:text-gray-300">
                        {{ $article->content }}
                    </p>

                    <div class="mt-4 text-sm text-gray-500">
                        {{ $article->created_at->format('F d, Y') }}
                    </div>

                </div>

            @empty

                <div class="text-gray-500">
                    No news available.
                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>