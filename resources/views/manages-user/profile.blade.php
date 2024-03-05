@extends('layouts.dashboard')
@section('content')
    <section>
        <!-- component -->
        <div class="flex items-center mt-24 w-full justify-center">

            <div class="max-w-lg w-full">
                <div class="bg-white shadow-xl rounded-lg py-3 px-12">
                    <div class="photo-wrapper p-2">
                        @if ($user->avatar && !Str::contains($user->avatar, 'googleusercontent.com'))
                            {{-- Jika avatar tersedia dan bukan dari Google, tampilkan avatar pengguna --}}
                            <img class="w-40 h-40 rounded-full mx-auto" src="{{ asset('storage/' . $user->avatar) }}"
                                alt="{{ $user->name }}">
                        @elseif ($user->avatar)
                            {{-- Jika avatar tersedia dan dari Google, tampilkan foto profil Google --}}
                            <img class="w-40 h-40 rounded-full mx-auto" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                        @else
                            {{-- Jika avatar tidak tersedia, tampilkan gambar placeholder --}}
                            <img class="w-40 h-40 rounded-full mx-auto"
                                src="https://cdn.vectorstock.com/i/preview-1x/08/19/gray-photo-placeholder-icon-design-ui-vector-35850819.jpg"
                                alt="user photo">
                        @endif
                    </div>
                    <div class="p-2">
                        <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ Auth::user()->name }}</h3>
                        <div class="text-center text-gray-400 text-lg font-semibold">
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <table class="text-md my-3">
                            <tbody>
                                <tr>
                                    <td class="px-2 py-2 text-gray-500 font-semibold">Username</td>
                                    <td class="px-2 py-2">{{ Auth::user()->username }}</td>
                                </tr>
                                <tr>
                                    <td class="px-2 py-2 text-gray-500 font-semibold">Bio</td>
                                    <td class="px-2 py-2">{{ Auth::user()->bio }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-center my-3">
                            <a class="text-sm text-indigo-500 hover:underline hover:text-indigo-600 font-medium"
                                href="/dashboard/profile/edit">Edit Profile</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
