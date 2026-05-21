<x-app-layout>

    <div class="max-w-3xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">
            Contact Us
        </h1>

        <p class="text-gray-700 dark:text-gray-300 mb-8">
            Have a question, suggestion, or issue? Send us a message and we’ll get back to you.
        </p>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-white rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('contact.store') }}"
            class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Name
                </label>
                <input type="text" name="name"
                    class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                    placeholder="Your name">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email
                </label>
                <input type="email" name="email"
                    class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                    placeholder="you@example.com">
            </div>

            <!-- Message -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Message
                </label>
                <textarea name="message" rows="5"
                    class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                    placeholder="Write your message..."></textarea>
            </div>

            <!-- Button -->
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Send Message
            </button>

        </form>

    </div>

</x-app-layout>