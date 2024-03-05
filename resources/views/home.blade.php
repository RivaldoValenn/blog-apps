@extends('layouts.main')
@section('content')
<section class="dark:bg-gray-800 dark:text-gray-100 mt-20 relative font-roboto">
        @if ($newest->count() > 0)
        <h1 class="text-4xl font-bold text-center">Latest Post</h1>    
        @else
        <h1 class="text-2xl text-gray-500 text-center absolute top-[30%] left-1/2 transform -translate-x-1/2 -translate-y-1/2">No Post Available</h1>
        @endif
        <div class="container max-w-7xl p-6 mx-auto space-y-6 sm:space-y-12">
            @foreach ($newest as $newPost)
            <a rel="noopener noreferrer" href="/posts/{{ $newPost->slug }}" class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
                @if ($newPost->image)
                <img src="{{ asset('storage/' . $newPost->image . '') }}" alt="" class="object-cover w-full shadow-lg h-64 rounded-lg sm:h-96 lg:col-span-7 dark:bg-gray-500">
                @else    
                <img src="https://placeholder.com/480x360" alt="" class="object-cover w-full h-64 rounded-lg sm:h-96 lg:col-span-7 dark:bg-gray-500">
                @endif
                <div class="px-2 py-6 space-y-2 lg:col-span-5">
                    <h3 class="text-2xl font-semibold sm:text-4xl   block mb-2 hover:text-blue-600">{{ $newPost->title }}</h3>
                    @if ($newPost->created_at->diffInDays() > 1)
                    <span class="text-md text-black text-opacity-50">{{ $newPost->created_at->format('F j, Y, g:i A') }}</span>
                    @else
                    <span class="text-md text-black text-opacity-50">{{ $newPost->created_at->diffForHumans() }}</span>    
                    @endif
                    <p>{{ Str::limit(strip_tags($newPost->body), 450, '...') }}</p>
                </div>
            </a>
                            
            @endforeach
            <div class="grid justify-center grid-cols-2 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($post as $posts)   
                <a rel="noopener noreferrer" href="/posts/{{ $posts->slug }}" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
                    @if ($posts->image)    
                    <img class="object-cover w-full rounded-md shadow-lg h-60 dark:bg-gray-500" src="{{ asset('storage/' . $posts->image . '') }}">
                    @else
                    <img class="object-cover w-full rounded-md shadow-lg h-60 dark:bg-gray-500" src="https://placeholder.com/480x360">
                    @endif
                    <div class="px-2 py-4 space-y-2">
                        <h3 class="lg:text-2xl text-xl font-semiboldhover:text-blue-600">{{ $posts->title }}</h3>
                        @if ($posts->created_at->diffInDays() > 1)
                        <span class="text-md text-black text-opacity-50">{{ $posts->created_at->format('F j, Y, g:i A') }}</span>
                        @else
                        <span class="text-md text-black text-opacity-50">{{ $posts->created_at->diffForHumans() }}</span>                       
                        @endif
                        <p>{{ Str::limit(strip_tags($posts->body), 150, '...') }}</p>
                    </div>
                </a>
                @endforeach     
            </div>
            <div class="flex justify-center">
                @if ($post->count() > 0)         
                <a href="/posts">
                    <button type="button" class="lg:px-4 px-3 py-2 lg:py-2 text-md lg:text-lg rounded-md bg-sky-600 hover:bg-sky-700 text-white hover:bg-sk">See All Posts</button>
                </a>
                @endif
            </div>
        </div>
    </section>
@endsection
