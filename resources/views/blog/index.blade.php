<!-- resources/views/blog/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Blog Home Screen') }}
            </h2>
            <a href="{{ route('blog.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                {{ __('Create Post') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($posts->isEmpty())
                        <p class="text-lg text-gray-700">No posts available.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($posts as $post)
                                <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-700">
                                    <h2 class="text-2xl font-bold mb-4">
                                        <a href="{{ route('blog.show', $post->id) }}" class="hover:underline">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ Str::limit($post->content, 150) }}</p>
                                    @can('update', $post)
                                        <a href="{{ route('blog.edit', $post->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
