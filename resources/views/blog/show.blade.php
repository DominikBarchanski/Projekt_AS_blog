<!-- resources/views/blog/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ $post->content }}</p>
                    @can('update', $post)
                        <a href="{{ route('blog.edit', $post->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                    @endcan

                    <h3 class="text-2xl font-bold mt-6">Comments</h3>
                    @if($comments->isEmpty())
                        <p>No comments yet.</p>
                    @else
                        <div class="mt-4">
                            @foreach($comments as $comment)
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg mb-4">
                                    <p>{{ $comment->content }}</p>
                                    <small>by {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y') }}</small>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('blog.comment', $post->id) }}" class="mt-6">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Add a comment</label>
                            <textarea name="content" id="content" rows="3" class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
