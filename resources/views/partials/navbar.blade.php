<!-- navbar goes here -->
<nav class="bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">

            <div class="flex space-x-4">
                <!-- logo -->
                <div>
                    <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                        <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <span class="font-bold">Gallery</span>
                    </a>
                </div>

                <!-- primary nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/posts" class="py-5 px-3 text-gray-700 hover:text-gray-900">Posts</a>
                    <a href="/dashboard" class="py-5 px-3 text-gray-700 hover:text-gray-900">Dashboard</a>
                </div>
            </div>

            <!-- secondary nav -->


            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @auth
                        @if (Auth::user()->avatar)
                            @if (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL))
                                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->avatar }}"
                                    alt="{{ Auth::user()->name }}">
                            @else
                                <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                    alt="{{ Auth::user()->name }}">
                            @endif
                        @else
                            <img class="w-10 h-10 rounded-full"
                                src="https://cdn.vectorstock.com/i/preview-1x/08/19/gray-photo-placeholder-icon-design-ui-vector-35850819.jpg"
                                alt="user photo">
                        @endif
                    @endauth
                    @guest
                        <img class="w-10 h-10 rounded-full"
                            src="https://cdn.vectorstock.com/i/preview-1x/08/19/gray-photo-placeholder-icon-design-ui-vector-35850819.jpg"
                            alt="user photo">
                    @endguest
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        @auth
                            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                        @endauth
                        @guest
                            <span class="block text-sm text-gray-900 dark:text-white">Guest User</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">guest@gmail.com</span>
                        @endguest
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                   
                        @if (auth()->check())
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button
                                        class="w-full flex justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="/login"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>


            <!-- mobile button goes here -->
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <a href="/Posts" class="block py-2 px-4 text-sm hover:bg-gray-200">Posts</a>
        <a href="/dashboard" class="block py-2 px-4 text-sm hover:bg-gray-200">Dashboard</a>
    </div>
</nav>


<script>
    // grab everything we need
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    // add event listeners
    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>
