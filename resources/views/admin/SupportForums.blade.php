<x-app-layout>

    <div class="max-w-6xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">
            Support Messages
        </h1>

        <div class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="text-left p-4">Name</th>
                        <th class="text-left p-4">Email</th>
                        <th class="text-left p-4">Message</th>
                        <th class="text-left p-4">Date</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($forums as $forum)

                        <tr class="border-t border-gray-200 dark:border-gray-700">

                            <td class="p-4 text-white">
                                {{ $forum->name }}
                            </td>

                            <td class="p-4 text-white">
                                {{ $forum->email }}
                            </td>

                            <td class="p-4 text-white">
                                {{ $forum->message }}
                            </td>

                            <td class="p-4 text-white">
                                {{ $forum->created_at->format('d M Y H:i') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="p-4 text-center text-white">
                                No support messages found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>