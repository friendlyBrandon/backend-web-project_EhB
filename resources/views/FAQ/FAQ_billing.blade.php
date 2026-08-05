<x-app-layout>
<div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 4 ? null : 4">
                    Is this platform free?
                </button>
                <div x-show="open === 4" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Yes, the platform is completely free to use. Premium features may be added in the future.
                </div>
            </div>

            </x-app-layout>