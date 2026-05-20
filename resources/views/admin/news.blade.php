<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">
            Manage News
        </h1>

        <!-- Create Form -->
        <form method="POST" action="{{ route('admin.news.store') }}"
              class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow mb-10">

            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Title
                </label>

                <input type="text"
                       name="title"
                       class="w-full rounded border-gray-300">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Content
                </label>

                <textarea name="content"
                          rows="6"
                          class="w-full rounded border-gray-300"></textarea>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Publish News
            </button>

        </form>

        <!-- Existing News -->
        <div class="space-y-6">

            @foreach($news as $article)

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

                    <h2 class="text-2xl font-bold">
                        {{ $article->title }}
                    </h2>

                    <p class="mt-3">
                        {{ $article->content }}
                    </p>

                    <form method="POST"
                          action="{{ route('admin.news.destroy', $article) }}"
                          class="mt-4">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded">
                            Delete
                        </button>

                    </form>

                </div>

            @endforeach

        </div>

    </div>

</x-app-layout>