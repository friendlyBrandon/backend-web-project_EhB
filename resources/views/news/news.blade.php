<div x-data="{ open: null }"></div>
<center><x-app-layout>
    @forelse($news as $article)

        <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6">

            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $article->title }}
            </h2>

            <p class="mt-4 text-gray-700 dark:text-gray-300">
                {{ \Illuminate\Support\Str::limit($article->content, 150) }}
            </p>

            <div class="mt-4 flex justify-between items-center">

                <div class="text-sm text-white">
                    {{ $article->created_at->format('F d, Y') }}
                    <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6">

                        @if($article->image)
                            <div x-data="{ open: null }">

                                <img src="{{ asset('storage/' . $article->image) }}"
                                    class="w-full max-h-64 object-cover rounded-lg mb-4 cursor-pointer"
                                    @click="open = '{{ asset('storage/' . $article->image) }}'">

                                <!-- Modal -->
                                <div x-show="open"
                                    class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
                                    x-transition @click="open = null">

                                    <img :src="open" class="max-w-full max-h-full rounded-lg shadow-lg">

                                </div>
                            </div>
                        @endif

                        <a href="{{ route('news.fullview', $article) }}" class="text-blue-500 hover:underline">
                            Read more →
                        </a>

                    </div>

                </div>

    @empty

                <p class="text-gray-500">No news available.</p>

            @endforelse
</x-app-layout></center>