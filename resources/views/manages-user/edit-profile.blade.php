@extends('dashboard')
@section('content')
    <button type="button"
        class="flex items-center justify-center w-1/2 px-3 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
        <a href="/dashboard/profile">Go back</a>
    </button>
    <section class="flex justify-start items-start mt-12">
        <form class="w-full max-w-sm lg:max-w-4xl mx-auto px-5" method="POST" action=""
            enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                    <input type="text" id="name" name="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="{{ $user->name }}">
                    @error('name')
                        <small class="text-rose-500 font-bold">{{ $message }}</small>
                    @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" id="username" name="username"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="{{ $user->username }}">
                @error('username')
                    <small class="text-rose-500 font-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-5">
                <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                <textarea id="bio" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..." name="bio">{{ $user->bio }}</textarea>
                @error('bio')
                    <small class="text-rose-500 font-bold">{{ $message }}</small>
                @enderror
            </div>
            <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Change Profile
                Picture</label>
            @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" class="mb-5 img-preview h-40 w-40 rounded-full" alt="profile_picture">
            @else
                <img class="mb-5 img-preview h-10 w-10 rounded-full" alt="profile_picture">
            @endif
            <input type="hidden" name="oldAvatar" value="{{ $user->avatar }}">
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="image" name="avatar" type="file" onchange="previewImage()">
            @error('avatar')
                <small class="text-rose-500 font-bold">{{ $message }}</small>
            @enderror
            <div class="mt-5 mb-8">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            </div>
        </form>
    </section>
@endsection
