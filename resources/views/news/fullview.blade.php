<div x-data="{ open: null }"></div>
<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <!-- ARTICLE -->
        <div class="bg-white dark:bg-gray-800 shadow text-white rounded-xl p-6">

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ $news->title }}
            </h1>

            <p class="mt-6 text-gray-700 dark:text-gray-300">
                {{ $news->content }}
            </p>
            @if($news->image)

                <img src="{{ asset('storage/' . $news->image) }}"
                    class="w-full max-h-[800px] object-contain rounded-xl mb-6">

            @endif
            {{ $news->created_at->format('F d, Y') }}
        </div>

    </div>

    <!-- COMMENTS -->
    <div class="mt-10">

        <h2 class="text-2xl font-bold mb-4 dark:text-white">
            Comments
        </h2>

        @auth
            <form method="POST" action="{{ route('comments.store', $news) }}" class="mb-6">
                @csrf

                <textarea name="message" class="w-full rounded border-gray-300" rows="4"
                    placeholder="Write a comment..."></textarea>

                <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded">
                    Post Comment
                </button>
            </form>
        @else
            <p class="text-gray-500">Log in to comment.</p>
        @endauth

        <!-- LIST COMMENTS -->
        <div class="space-y-4">

            @forelse($news->comments as $comment)

                <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">

                    <div class="text-sm font-semibold text-gray-900 dark:text-white">
                        {{ $comment->user->name }}
                    </div>

                    <div class="text-gray-700 dark:text-gray-300 mt-1">
                        {{ $comment->message }}
                    </div>

                </div>

            @empty

                <p class="text-gray-500">No comments yet.</p>

            @endforelse

        </div>

    </div>

    </div>

</x-app-layout>