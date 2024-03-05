@extends('layouts.main')

@section('content')
    <section class="bg-white py-6 sm:py-8 mt-14 font-roboto">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8"> 
          <!-- Heading -->
          <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Most Liked Photos</h2>
      
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg"></p>
          </div>
          <!-- /Heading -->
          <div class="grid gap-8 sm:grid-cols-2 sm:gap-12 lg:grid-cols-2 xl:grid-cols-2 xl:gap-16">
            <!-- Article -->
            @foreach ($topPosts as $posts)
            <article class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
              <a href="/post/{{ $posts->slug }}" class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                @if ($posts->image)
                <img src="{{ asset('storage/' . $posts->image) }}" loading="lazy" alt="{{ $posts->title }}" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                @else
                <img src="https://images.unsplash.com/photo-1476362555312-ab9e108a0b7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" loading="lazy" alt="default" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                @endif
              </a>
      
              <div class="flex flex-col gap-2">
                <span class="text-sm text-gray-400">{{ $posts->created_at->format('F j, Y') }}</span>
      
                <h2 class="text-xl font-bold text-gray-800">
                  <a href="/post/{{ $posts->slug }}" class="transition duration-100 hover:text-blue-600 active:text-rose-600">{{ $posts->title }}</a>
                </h2>
                <p class="text-gray-500">{{ Str::limit(strip_tags($posts->body), 200, '...') }}</p>
      
      
                <div class="flex justify-between items-center">
                  <a href="/posts/{{ $posts->slug }}" class="font-semibold text-white px-4 -ml-2 py-2 rounded-full text-sm bg-sky-600 transition duration-100 hover:bg-sky-700">Read more</a>
                  <span class="inline-flex items-center gap-1 text-lg mt-2 text-center text-rose-500 px-4"><i class="bi bi-suit-heart-fill"></i>{{ $posts->likes->count() }}</span>
                </div>
              </div>
            </article>
            @endforeach
          </div>
        </div>
      </section>
      
@endsection
