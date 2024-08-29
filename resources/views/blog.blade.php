<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $blog->title }}</h1>
                <div class="flex justify-between text-gray-700 text-md mt-2">
                    <div>
                        <a href="{{ route('blogs.author', $blog->author->username) }}" class="hover:underline hover:text-gray-500">{{ $blog->author->name }}</a> |
                        <a href="{{ route('blogs.category', $blog->category->slug) }}" class="hover:underline hover:text-gray-500">{{ $blog->category->name }}</a>
                    </div>
                    <small class="p-1 bg-indigo-500 text-white rounded-md text-xs">{{ $blog->created_at->format('j M Y') }}</small>
                </div>
                <p class="text-gray-700 text-base leading-relaxed my-6">
                    {{ $blog->content }}
                </p>
                <div class="border-t border-gray-200 pt-6">
                    <a href="{{ route('blogs.index') }}" class="text-indigo-500 hover:text-indigo-700 text-sm font-medium">
                        Back to all blogs
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-layout>