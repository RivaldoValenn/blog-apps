@extends('layouts.main')
@section('content')
    @include('partials.navbar')
    <section class="mt-12 py-8 flex justify-center items-center">
        <div class="container overflow-hidden grid grid-cols-1 lg:grid-cols-3 gap-5 px-10">
            @foreach ($categories as $category)
            <a href="/posts?category={{ $category->slug }}">
                    <article class="relative overflow-hidden rounded-lg shadow-xl transition hover:shadow-lg">
                        <img alt="Office" src="https://source.unsplash.com/random/600x400?{{ ucfirst($category->name) }}"
                            class="absolute inset-0 h-full w-full object-cover" />

                        <div class="relative bg-gradient-to-t from-gray-900/50 to-gray-900/25 pt-36 sm:pt-48 lg:pt-64">
                            <div class="p-4 sm:p-6">

                                <h3 class="mt-0.5 text-white font-bold text-2xl">
                                    {{ $category->name }}
                                </h3>

                            </div>
                        </div>
                    </article>
                </a>
                @endforeach
            </div>
        </section>
    <div class="pt-4">
        {{ $categories->links() }}
    </div>
@endsection
