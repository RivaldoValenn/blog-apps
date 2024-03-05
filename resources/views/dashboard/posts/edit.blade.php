@extends('layouts.dashboard')
@section('content')
<button type="button" class="flex items-center justify-center w-1/2 px-3 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
    <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
    </svg>
    <a href="/dashboard/posts">Go back</a>
</button>
    <section class="flex justify-start items-start mt-12">
        <form class="w-full max-w-sm lg:max-w-4xl mx-auto px-5" method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title
                    <input type="text" id="title" name="title"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="{{ old('title', $post->title) }}">
                    @error('title')
                    <small class="text-rose-500 font-bold">{{ $message }}</small>
                    @enderror
            </div>
            {{-- <div class="mb-5">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                   value="{{ old('slug', $post->slug) }}" >
                @error('slug')
                <small class="text-rose-500 font-bold">{{ $message }}</small>
                @enderror
            </div> --}}
            <div class="mb-5">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <input id="x" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="x"></trix-editor>
                @error('body')
                    <small class="text-rose-500 font-bold">{{ $message }}</small>
                @enderror
            </div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="mb-5 img-preview" alt="">
            @else
            <img class="mb-5 img-preview">
            @endif
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="image" name="image" type="file" onchange="previewImage()">
            @error('image')
            <small class="text-rose-500 font-bold">{{ $message }}</small>
        @enderror
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG (Max 1024Kb).</p>
            <label for="category" class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Select
                Category</label>
            <select id="category" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categories as $category)
                    @if (old('category_id', $post->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option> 
                    @endif
                @endforeach
            </select>
            <div class="mt-5 mb-8">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
            </div>
        </form>
    </section>
@endsection
