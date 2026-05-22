@if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded mb-6">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif
<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">
            Manage News
        </h1>

        <!-- Create Form -->
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data"
            class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow mb-10">

            @csrf

            <div class="mb-4 text-white">
                <label class="block mb-2 font-semibold">
                    Title
                </label>

                <input type="text" name="title" class="w-full rounded border-gray-300">
            </div>

            <div class="mb-4 text-white">
                <label class="block mb-2 font-semibold">
                    Content
                </label>

                <textarea name="content" rows="6" class="w-full rounded border-gray-300"></textarea>
            </div>
            <div class="mb-4 text-white">
                <label class="block mb-2 font-semibold">
                    News Image
                </label>

                <input type="file" name="image" class="w-full rounded border-gray-300">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Publish News
            </button>

        </form>

        <!-- Existing News -->
        <div class="space-y-6">

            @foreach($news as $article)

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

                    <h2 class="text-2xl font-bold text-white">
                        {{ $article->title }}
                    </h2>

                    <p class="mt-3 text-white">
                        {{ $article->content }}
                    </p>

                    <form method="POST" action="{{ route('admin.news.destroy', $article) }}" class="mt-4 text-white">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                            Delete
                        </button>

                    </form>

                </div>

            @endforeach

        </div>

    </div>

</x-app-layout>