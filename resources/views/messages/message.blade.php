<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 text-white">

        <!-- Header -->
        <center><h1 class="text-2xl font-bold mb-6">
            Messaging {{ $user->username }}
        </h1></center>

        <!-- Messages -->
        <div class="space-y-4 mb-8">

            @foreach($messages as $message)

                        @php
                            $isMine = $message->sender_id == auth()->id();

                            $avatar = $message->sender->profile_pic_path
                                ? Storage::url($message->sender->profile_pic_path)
                                : 'https://ui-avatars.com/api/?name=' . urlencode($message->sender->username);
                        @endphp

                        <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }}">

                            @if(!$isMine)
                                <img src="{{ $avatar }}" class="w-8 h-8 rounded-full mr-2 self-end">
                            @endif

                            <div class="max-w-xs md:max-w-md px-4 py-2 text-sm leading-relaxed
    {{ $isMine
        ? 'bg-blue-600 text-white'
        : 'bg-gray-700 text-white'
    }}"
    style="border-radius: 18px;">
    {{ $message->body }}
</div>
                            @if($isMine)
                                    <img src="{{ Auth::user()->profile_pic_path
                                ? Storage::url(Auth::user()->profile_pic_path)
                                : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->username)
                                    }}" class="w-8 h-8 rounded-full ml-2 self-end">
                            @endif

                        </div>

            @endforeach

        </div>

        <!-- Send Message Form -->
        <form method="POST" action="{{ route('messages.send', $user->username) }}">

            @csrf

            <textarea name="message" rows="6" placeholder="Write your message..."
                class="w-full rounded-xl bg-gray-700 border-gray-600 text-black mb-4"></textarea>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-5 py-2 rounded-lg font-semibold transition">
                Send Message
            </button>

        </form>

    </div>

</x-app-layout>