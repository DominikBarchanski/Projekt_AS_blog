<!-- resources/views/blog/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('blog.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                            <textarea name="content" id="content" rows="5" class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
