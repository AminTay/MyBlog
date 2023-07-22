<x-author-layout>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're now logged in!") }}
                    <p> as a/an {{auth()->user()->rule}}</p>
                </div>
            </div>
        </div>
    </div>
</x-author-layout>
