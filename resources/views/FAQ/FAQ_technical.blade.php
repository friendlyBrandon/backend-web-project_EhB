<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">
            Frequently Asked Questions
        </h1>

        <div class="space-y-4" x-data="{ open: null }">

            <!-- 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 1 ? null : 1">
                    What is this platform?
                </button>
                <div x-show="open === 1" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    This is a social platform where you connect with people based on shared interests using tags.
                </div>
            </div>

            <!-- 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 2 ? null : 2">
                    How do tags work?
                </button>
                <div x-show="open === 2" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Tags represent your interests like gaming, coding, music, sports, or travel. They help match you
                    with similar users.
                </div>
            </div>

            <!-- 3 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 3 ? null : 3">
                    Can I change my interests later?
                </button>
                <div x-show="open === 3" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Yes, you can update your profile and modify your tags anytime.
                </div>
            </div>

            <!-- 4 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 4 ? null : 4">
                    Is this platform free?
                </button>
                <div x-show="open === 4" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Yes, the platform is completely free to use. Premium features may be added in the future.
                </div>
            </div>

            <!-- 5 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 5 ? null : 5">
                    How do I find new friends?
                </button>
                <div x-show="open === 5" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    You can discover users with similar tags, send friend requests, or receive recommendations.
                </div>
            </div>

            <!-- 6 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 6 ? null : 6">
                    Can I block or report users?
                </button>
                <div x-show="open === 6" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Yes, you can block or report users if you feel uncomfortable or unsafe.
                </div>
            </div>

            <!-- 7 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 7 ? null : 7">
                    How does matching work?
                </button>
                <div x-show="open === 7" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    The system compares your tags with other users and suggests people with the highest overlap in
                    interests.
                </div>
            </div>

            <!-- 8 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <button class="w-full text-left px-5 py-4 font-semibold text-gray-900 dark:text-gray-100"
                    @click="open = open === 8 ? null : 8">
                    Is my data private?
                </button>
                <div x-show="open === 8" class="px-5 pb-4 text-gray-700 text-center dark:text-gray-300">
                    Yes, your personal data is protected and only shared according to your privacy settings.
                </div>
            </div>

        </div>

        <div class="text-center mt-10 text-sm text-gray-500 dark:text-gray-400">
            Still have questions? Contact support anytime.
        </div>

    </div>

</x-app-layout>