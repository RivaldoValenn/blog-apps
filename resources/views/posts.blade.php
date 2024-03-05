    @extends('layouts.main')

    @section('content')
        <section class="py-2 flex justify-center items-center font-roboto">
            <div class="w-full px-6 lg:py-10">
            <div class="flex justify-center py-5">
               <form class="lg:w-1/2 w-full" action="/posts">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request()->category }}">
                @endif
                @if (request('author'))    
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search posts..." name="search" value="{{ request('search') }}">
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            </div>  
                @if ($posts->count() > 0)
                <h1 class="text-2xl font-bold pb-4 font-roboto px-2">{{ $title }}</h1>
                @endif
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div
                                class="bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                                @if ($post->image)
                                    <a href="/posts/{{ $post->slug }}">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                        class="w-full mb-3 h-72 rounded-md shadow-lg">
                                    </a>
                                @else
                                    <a href="/posts/{{ $post->slug }}">
                                        <img src="https://placeholder.com/480x360" class="w-full mb-3 h-72 rounded-md shadow-lg">
                                    </a>
                                @endif
                                <div class="px-1 pt-2">
                                    <div class="mb-4">
                                        <a href="/posts?category={{ $post->category->slug }}"
                                            class="text-sm underline text-blue-600 flex items-center gap-1 mb-2">
                                            <button
                                                class="px-4 py-1 bg-sky-600 text-white rounded-full inline-flex items-center justify-center hover:bg-sky-700 hover:underline">
                                                {{ $post->category->name }}</button>
                                        </a>
                                        <a href="/posts/{{ $post->slug }}"
                                            class="text-gray-900 font-bold text-lg hover:text-indigo-600 inline-block">{{ Str::limit($post->title, 30) }}</a>
                                        <p>{{ Str::limit(strip_tags($post->body), 200, '...') }}</p>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div
                            class="flex justify-center items-center absolute top-[30%] left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="text-center">
                                <p class="text-gray-600 text-2xl">No Posts Found!!</p>
                            </div>
                    @endif
                </div>
            </div>
        </section>
        <div class="lg:pt-0 pt-4">
            {{ $posts->links() }}
        </div>
    @endsection
