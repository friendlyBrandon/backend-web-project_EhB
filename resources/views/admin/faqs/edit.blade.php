<x-app-layout>

    <div class="max-w-2xl mx-auto px-4 py-8">

        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
            Edit FAQ
        </h1>

        <form
            method="POST"
            action="{{ route('admin.faqs.update', $faq) }}"
            class="space-y-5"
        >
            @csrf
            @method('PUT')

            <div>
                <label
                    for="category"
                    class="block font-medium text-gray-900 dark:text-gray-100 mb-1"
                >
                    Category
                </label>

                <select
                    name="category"
                    id="category"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required
                >
                    <option value="general" {{ old('category', $faq->category) === 'general' ? 'selected' : '' }}>
                        General
                    </option>

                    <option value="data" {{ old('category', $faq->category) === 'data' ? 'selected' : '' }}>
                        Data protection
                    </option>

                    <option value="safe" {{ old('category', $faq->category) === 'safe' ? 'selected' : '' }}>
                        Staying Safe
                    </option>

                    <option value="technical" {{ old('category', $faq->category) === 'technical' ? 'selected' : '' }}>
                        Technical
                    </option>
                </select>

                @error('category')
                    <p class="text-red-600 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label
                    for="question"
                    class="block font-medium text-gray-900 dark:text-gray-100 mb-1"
                >
                    Question
                </label>

                <input
                    type="text"
                    name="question"
                    id="question"
                    value="{{ old('question', $faq->question) }}"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required
                >

                @error('question')
                    <p class="text-red-600 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label
                    for="answer"
                    class="block font-medium text-gray-900 dark:text-gray-100 mb-1"
                >
                    Answer
                </label>

                <textarea
                    name="answer"
                    id="answer"
                    rows="8"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required
                >{{ old('answer', $faq->answer) }}</textarea>

                @error('answer')
                    <p class="text-red-600 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                >
                    Save Changes
                </button>

                <a
                    href="{{ route('admin.faqs.index') }}"
                    class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-app-layout>