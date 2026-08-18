<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">
            Frequently Asked Questions for Data protection
        </h1>

        <div class="space-y-4" x-data="{ open: null }">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 1 ? null : 1">
                    What personal information does BuddyTalks collect?
                </button>
                <div x-show="open === 1" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    BuddyTalks may collect information such as your name, email address, profile details, interests, and
                    information you choose to share while using the platform.
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 2 ? null : 2">
                    Does BuddyTalks sell my personal data?
                </button>
                <div x-show="open === 2" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    No. BuddyTalks does not sell your personal information to third parties.
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 3 ? null : 3">
                    Can I delete my account and personal data?
                </button>
                <div x-show="open === 3" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Yes. You can request to delete your account and associated personal information, subject to any
                    information we may be required to retain for legal, security, or legitimate business purposes.
                </div>
            </div>
        </div>

</x-app-layout>