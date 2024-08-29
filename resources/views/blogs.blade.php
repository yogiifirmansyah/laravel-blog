<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot:header></x-slot:header>

    <form class="max-w-md mx-auto my-8">
        @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Article ..." required autocomplete="off" />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    {{ $blogs->links() }}

    <div class="grid lg:grid-cols-3 gap-8 max-w-7xl lg:px-0 px-4 my-8">
        @forelse ($blogs as $blog)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <a href="{{ route('blogs.show', $blog->slug) }}" class="text-xl font-semibold text-gray-800 hover:text-gray-600 hover:underline">{{ $blog->title }}</a>
                <div class="text-gray-700 text-md mt-2">
                    <a href="{{ url('/blogs?author=' . $blog->author->username) }}" class="hover:underline hover:text-gray-500">{{ $blog->author->name }}</a> |
                    <a href="{{ url('/blogs?category=' . $blog->category->slug) }}" class="hover:underline hover:text-gray-500">{{ $blog->category->name }}</a>
                </div>
                <small class="p-1 bg-indigo-500 text-white rounded-md text-xs">{{ $blog->created_at->diffForHumans() }}</small>
                <p class="mt-4 text-gray-700 text-sm">
                    {{ Str::limit($blog->content, 120) }}
                </p>
            </div>
            <div class="px-6 py-4 bg-gray-100">
                <a href="{{ route('blogs.show', $blog->slug) }}" class="text-indigo-500 hover:text-indigo-700 text-sm font-medium">
                    Read more
                </a>
            </div>
        </div>
        @empty
        <div>
            <p class="font-semibold text-xl">Article Not Found</p>
            <a href="{{ url('blogs') }}" class="text-indigo-500 hover:text-indigo-700 text-sm font-medium">
                &laquo; Back to all blogs
            </a>
        </div>
        @endforelse
    </div>

</x-layout>