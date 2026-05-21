<x-app-layout>

    <div class="max-w-3xl mx-auto py-10 text-white">

        <h1 class="text-2xl font-bold mb-6">Inbox</h1>

        @foreach($messages as $message)

            @php
                $otherUser = $message->sender_id == auth()->id()
                    ? $message->receiver
                    : $message->sender;
            @endphp

            <a href="{{ route('messages.message', $otherUser->username) }}"
                class="block bg-gray-800 p-4 rounded-xl mb-3 hover:bg-gray-700">

                <div class="font-semibold text-white">
                    {{ $otherUser->username }}
                </div>

                <div class="text-sm text-gray-300">
                    {{ Str::limit($message->body, 50) }}
                </div>

                <div class="text-xs text-gray-500 mt-1">
                    {{ $message->created_at->diffForHumans() }}
                </div>

            </a>

        @endforeach

    </div>

</x-app-layout>