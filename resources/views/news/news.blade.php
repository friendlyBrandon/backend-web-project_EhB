<x-app-layout>
@forelse($news as $article)

    <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            {{ $article->title }}
        </h2>

        <p class="mt-4 text-gray-700 dark:text-gray-300">
            {{ \Illuminate\Support\Str::limit($article->content, 150) }}
        </p>

        <div class="mt-4 flex justify-between items-center">

            <div class="text-sm text-gray-500">
                {{ $article->created_at->format('F d, Y') }}
            </div>

            <a href="{{ route('news.fullview', $article) }}"
               class="text-blue-500 hover:underline">
                Read more →
            </a>

        </div>

    </div>

@empty

    <p class="text-gray-500">No news available.</p>

@endforelse
</x-app-layout>