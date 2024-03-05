@extends('layouts.dashboard')
@section('content')
    <section>
        <div class="overflow-x-auto">
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
                <div class="p-6 absolute bottom-0 left-0 z-20">
                    <h2 class="text-4xl font-semibold text-white leading-tight mb-4 ">
                        {{ $post->title }}
                    </h2>
                    <div class="flex">
                        @if ($post->user->avatar)
                            @if (filter_var($post->user->avatar, FILTER_VALIDATE_URL))
                                <img src="{{ $post->user->avatar }}"
                                    class="h-16 w-16 rounded-full mr-2 object-cover" />
                            @else
                                
                            <img src="{{ asset('storage/' . $post->user->avatar) }}"
                                class="h-16 w-16 rounded-full mr-2 object-cover" />
                            
                            @endif
                        @else
                            <img src="https://randomuser.me/api/portraits/men/97.jpg"
                                class="h-16 w-16 rounded-full mr-2 object-cover" />
                        @endif
                        <div>
                            <p class="font-semibold text-white text-sm"> {{ $post->user->name }}</p>
                            <p class="font-semibold text-white text-xs"> {{ $post->created_at->format('F j Y | g:i A') }}
                                <div class="flex justify-start gap-2 items-start mt-2 ml-1">
                                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-2 py-1 text-white inline-flex items-center justify-center uppercase bg-red-600 rounded-lg"
                                            type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                        <a
                                            class="px-2 py-1 text-white inline-flex items-center justify-center uppercase bg-sky-500 rounded-lg"
                                            href="/dashboard/posts/{{ $post->slug }}/edit"><i class="bi bi-pen"></i></a>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div
            class="px-4 lg:px-0 mt-6 pb-14 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed flex flex-col gap-2">
            {!! $post->body !!}
        </div>
    </div>
    </section>
@endsection
