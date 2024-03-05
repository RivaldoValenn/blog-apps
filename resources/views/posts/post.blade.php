@extends('layouts.main')
@section('content')
    <main class="mt-8 pb-10 relative font-roboto">

        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            @else
                <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80"
                    class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            @endif
            <div class="p-4 absolute bottom-0 left-0 z-20 w-full">
                <a href="/categories/{{ $post->category->slug }}"
                    class="px-4 py-1 bg-sky-600 text-white rounded-full hover:bg-sky-700 hover:underline inline-flex items-center justify-center mb-2">{{ Str::ucfirst($post->category->slug) }}</a>
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    {{ $post->title }}
                </h2>
                <div class="flex mt-3">
                    @if ($post->user->avatar)
                        @if (filter_var($post->user->avatar, FILTER_VALIDATE_URL))
                            <img class="w-10 h-10 rounded-full mr-4" src="{{ $post->user->avatar }}"
                                alt="{{ $post->user->name }}">
                        @else
                            <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('storage/' . $post->user->avatar) }}"
                                alt="{{ $post->user->name }}">
                        @endif
                    @else
                        <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('storage/' . $post->user->avatar) }}"
                            alt="placeholder">
                    @endif
                    <div class="py-2 mt-2 absolute right-4 flex gap-4 items-center justify-center">
                        <span class="text-black">
                            <i class="bi bi-eye"></i> {{ $post->views }}
                        </span>
                        <livewire:like :post="$post" :key="$post->id" />
                    </div>
                    <div class="flex justify-between w-full">
                       <div class="flex flex-col">
                        <p class="font-semibold text-white text-sm"> {{ $post->user->name }} </p>
                        <p class="text-white">
                            @if($post->created_at->diffInDays() > 0)
                                {{ $post->created_at->format('F j Y | g:i A') }}
                            @else
                                {{ $post->created_at->diffForHumans() }}
                            @endif
                        </p>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed flex flex-col gap-2">
            {!! $post->body !!}
        </div>
    </main>

@endsection
