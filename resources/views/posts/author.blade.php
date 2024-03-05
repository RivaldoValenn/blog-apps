@extends('layouts.main')

@section('content')
    <div class="w-full mx-auto px-5 lg:py-16 py-16">
        @if ($posts->count() > 0)
            <h1 class="font-oswald text-2xl py-5">Posted By : {{ $posts->first()->user->name }}</h1>
       @endif
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div
                        class="bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full mb-3 h-72 rounded-md shadow-lg">
                        @else
                            <img src="https://placeholder.com/480x360" class="w-full mb-3 h-72 rounded-md shadow-lg">
                        @endif
                        <div class="px-1 pt-2">
                            <div class="mb-4">
                                <a href="/categories/{{ $post->category->slug }}"
                                    class="text-sm underline text-blue-600 flex items-center gap-1 mb-2">
                                    <button
                                        class="px-4 py-1 bg-sky-600 text-white rounded-full inline-flex items-center justify-center hover:bg-sky-700 hover:underline">
                                        {{ $post->category->name }}</button>
                                </a>
                                <a href="/posts/{{ $post->slug }}"
                                    class="text-gray-900 font-bold text-lg hover:text-indigo-600 inline-block">{{ Str::limit($post->title, 30) }}</a>
                                <p>{{ Str::limit(strip_tags($post->body), 200, '...') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="author flex">
                                    @if ($post->user->avatar)
                                        @if (filter_var($post->user->avatar, FILTER_VALIDATE_URL))
                                            <img class="w-10 h-10 rounded-full mr-4" src="{{ $post->user->avatar }}"
                                                alt="{{ $post->user->name }}">
                                        @else
                                            <img class="w-10 h-10 rounded-full mr-4"
                                                src="{{ asset('storage/' . $post->user->avatar) }}"
                                                alt="{{ $post->user->name }}">
                                        @endif
                                    @else
                                        <img class="w-10 h-10 rounded-full mr-4"
                                            src="https://cdn.vectorstock.com/i/preview-1x/08/19/gray-photo-placeholder-icon-design-ui-vector-35850819.jpg"
                                            alt="{{ $post->user->name }}">
                                    @endif
                                    <div class="text-sm">
                                        <a href="/posts/authors/{{ $post->user->username }}"
                                            class="text-gray-900 font-semibold leading-none hover:text-indigo-600">{{ $post->user->name }}</a>
                                        <p class="text-gray-600">
                                            @if ($post->created_at->diffInDays() > 0)
                                                {{ $post->created_at->format('F j Y | g:i A') }}
                                            @else
                                                {{ $post->created_at->diffForHumans() }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <livewire:like :post="$post" :key="$post->id" />
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div
                    class="flex justify-center items-center absolute top-[30%] left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <div class="text-center">
                        <p class="text-gray-600 text-2xl">There are no posts!!</p>
                    </div>
            @endif
        </div>
        <div class="pt-4">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
