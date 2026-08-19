<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        @forelse($news as $article)

            <article class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 mb-6">

                @if($article->image)
                    <div x-data="{ open: false }">

                        <img
                            src="{{ asset('storage/' . $article->image) }}"
                            alt="{{ $article->title }}"
                            class="w-full max-h-64 object-cover rounded-lg mb-4 cursor-pointer"
                            @click="open = true"
                        >

                        <!-- Image Modal -->
                        <div
                            x-show="open"
                            x-transition
                            class="fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4"
                            @click="open = false"
                        >
                            <img
                                src="{{ asset('storage/' . $article->image) }}"
                                alt="{{ $article->title }}"
                                class="max-w-full max-h-full rounded-lg shadow-lg"
                            >
                        </div>

                    </div>
                @endif

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $article->title }}
                </h2>

                <p class="mt-4 text-gray-700 dark:text-gray-300">
                    {{ \Illuminate\Support\Str::limit($article->content, 150) }}
                </p>

                <div class="mt-4 flex justify-between items-center">

                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $article->created_at->format('F d, Y') }}
                    </div>

                    <a
                        href="{{ route('news.fullview', $article) }}"
                        class="text-blue-500 hover:text-blue-400 hover:underline"
                    >
                        Read more →
                    </a>

                </div>

            </article>

        @empty

            <p class="text-gray-500 text-center">
                No news available.
            </p>

        @endforelse

    </div>

</x-app-layout>