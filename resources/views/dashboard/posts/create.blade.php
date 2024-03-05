@extends('layouts.dashboard')
@section('content')
    <section class="container flex justify-center items-center">
        <form class="mt-20 bg-white shadow-lg rounded-lg px-12 py-5" method="POST" action="/dashboard/posts"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                    <input type="text" id="title" name="title"
                        class="shadow-sm py-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <small class="text-rose-500 font-bold">{{ $message }}</small>
                    @enderror
            </div>
            {{-- <div class="mb-5">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="shadow-sm py-2 bg-gray-200 opacity-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    >
                @error('slug')
                    <small class="text-rose-500 font-bold">{{ $message }}</small>
                @enderror
            </div> --}}
            <div class="mb-5">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="body" name="body" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>

                @error('body')
                    <small class="text-rose-500 font-bold">{{ $message }}</small>
                @enderror
            </div>
            <img class="mb-5 img-preview" width="500">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Unggah
                Gambar</label>
            <input
                class="block  w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="image" name="image" type="file" onchange="previewImage()">
            @error('image')
                <small class="text-rose-500 font-bold">{{ $message }}</small>
            @enderror
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG(Max 1MB).</p>

            <label for="category" class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Kategori</label>
            <select id="category" name="category_id"
                class="py-2 px-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            <div class="mt-5">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Publish</button>
            </div>
        </form>
    </section>
@endsection
