<x-app-layout>

    <div class="max-w-6xl mx-auto px-4 py-8">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    Manage FAQs
                </h1>

                <p class="text-gray-500 dark:text-gray-400">
                    Create, edit and remove frequently asked questions.
                </p>
            </div>

            <a href="{{ route('admin.faqs.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Add FAQ
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($faqs->isEmpty())

            <div class="bg-white dark:bg-gray-800 border rounded-lg p-6">
                <p class="text-gray-500 dark:text-gray-400">
                    No FAQs have been created yet.
                </p>
            </div>

        @else

            <div class="space-y-4">

                @foreach($faqs as $faq)

                    <div class="bg-white dark:bg-gray-800 border rounded-lg p-5 shadow-sm">

                        <div class="flex justify-between gap-4">

                            <div>
                                <span
                                    class="inline-block bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm px-2 py-1 rounded mb-2">
                                    {{ ucfirst($faq->category) }}
                                </span>

                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $faq->question }}
                                </h2>

                                <p class="mt-2 text-gray-600 dark:text-gray-300 whitespace-pre-line">
                                    {{ $faq->answer }}
                                </p>
                            </div>

                            <div class="flex gap-2 shrink-0">

                                <a href="{{ route('admin.faqs.edit', $faq) }}"
                                    class="inline-flex items-center h-10 bg-yellow-500 text-white px-3 rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</x-app-layout>