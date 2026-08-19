@props([
    'name',
    'accept' => null,
])

<div {{ $attributes->only('class') }}>
    <label
        for="{{ $name }}"
        class="inline-flex items-center gap-2 px-4 py-2.5
               bg-gray-700 hover:bg-gray-600
               text-white text-sm font-semibold
               rounded-lg
               border border-gray-600
               cursor-pointer
               transition duration-200
               shadow-sm hover:shadow-md"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 16V4m0 0L8 8m4-4l4 4M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2"
            />
        </svg>

        <span>Upload File</span>
    </label>

    <input
        id="{{ $name }}"
        type="file"
        name="{{ $name }}"
        class="hidden"
        @if($accept) accept="{{ $accept }}" @endif
    />

    <p
        id="{{ $name }}-filename"
        class="mt-2 text-sm text-gray-400"
    >
        No file selected
    </p>
</div>

<script>
    document.getElementById('{{ $name }}').addEventListener('change', function () {
        const filename = document.getElementById('{{ $name }}-filename');

        if (this.files.length > 0) {
            filename.textContent = this.files[0].name;
        } else {
            filename.textContent = 'No file selected';
        }
    });
</script>