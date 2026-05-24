<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-8 text-white">
            Edit News
        </h1>

        @if ($errors->any())
            <div class="bg-red-500 text-black p-4 rounded mb-6">
                <ul class="list-disc ml-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data"
            class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

            @csrf
            @method('PUT')

            <div class="mb-4 text-white">
                <label class="block mb-2 font-semibold">
                    Title
                </label>

                <input type="text" name="title" value="{{ old('title', $news->title) }}"
                    class="w-full rounded border-gray-300 text-black">
            </div>

            <div class="mb-4 text-white">
                <label class="block mb-2 font-semibold">
                    Content
                </label>

                <textarea name="content" rows="6"
                    class="w-full rounded border-gray-300 text-black">{{ old('content', $news->content) }}</textarea>
            </div>

            <div class="mb-4 text-white">
                <label class="block mb-2 font-semibold">
                    Replace Image
                </label>

                <input type="file" name="image" class="w-full rounded border-gray-300">
            </div>

            @if($news->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $news->image) }}" class="w-64 rounded">
                </div>
            @endif

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Update News
            </button>

        </form>

    </div>

</x-app-layout>