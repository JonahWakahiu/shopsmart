<nav class="flex items-center justify-between sm:px-6 lg:px-8 py-4" x-data>
    <a href="#" class="ml-2 w-fit text-2xl font-bold text-black dark:text-white">
        <span class="sr-only">homepage</span>
        <p class="text-2xl font-bold">Sho<span class="text-blue-400">ps</span>mart</p>
    </a>

    <x-search-input class="min-w-[300px]" />

    <div class="flex items-center gap-4">
        <button @click="$store.darkMode.toggle()"
            class="size-8 flex items-center justify-center rounded-full bg-white dark:bg-slate-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-brightness-high size-5"
                viewBox="0 0 16 16">
                <path
                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
            </svg>
        </button>



        <a href="{{ route('cart') }}" class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart3 size-5" viewBox="0 0 16 16">
                <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
            </svg>

            <div x-cloak x-show="$store.cart.count > 0"
                class="absolute top-0 -right-1 translate-x-1/2 -translate-y-1/2  inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-semibold leading-4 bg-orange-500 text-white">
                <p x-text="$store.cart.count"></p>
            </div>
        </a>


        <button class="relative w-fit ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell size-5" viewBox="0 0 16 16">
                <path
                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
            </svg>
            <span
                class="absolute top-0 right-1 translate-x-1/2 -translate-y-1/2 size-2 rounded-full bg-orange-600 text-xs font-medium"></span>
        </button>


        <div x-data="{ open: false }" class="relative flex items-ceter justify-center">
            @guest
                <button @click="open = !open">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person size-5"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </button>
            @endguest

            @auth

                <button @click="open = !open" class="size-8 rounded-full overflow-hidden">
                    <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}"
                        class="w-full h-full object-cover object-center">
                </button>
            @endauth

            <div x-cloak x-show="open" @click.outside="open = false" x-transition
                class="absolute top-full mt-2 bg-white dark:bg-slate-800 shadow-md rounded-md py-2 right-0 min-w-[200px] border border-slate-200 dark:border-slate-700">
                <div>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-2 py-1.5 px-3 hover:bg-slate-200 dark:hover:bg-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person size-5"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <span>My Account</span>
                    </a>

                    <a href="{{ route('orders') }}"
                        class="flex items-center gap-2 py-1.5 px-3 hover:bg-slate-200 dark:hover:bg-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="size-5 shrink-0" aria-hidden="true">
                            <path
                                d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z" />
                            <path
                                d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.61-.719.595-1.227a24.905 24.905 0 0 0-1.784-8.549A1.486 1.486 0 0 0 14.823 5H13.25ZM14.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                        </svg>
                        <span>Orders</span>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-2 py-1.5 px-3 hover:bg-slate-200 dark:hover:bg-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person size-5"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <span>Profile</span>
                    </a>

                    <hr class="w-64 h-px my-2 bg-gray-200 border-0 dark:bg-slate-800">

                    <div class="mx-3">
                        @guest
                            <a href="{{ route('login') }}"
                                class="flex items-center justify-center gap-3 py-1.5 bg-slate-200 dark:bg-slate-900 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-box-arrow-in-right size-5" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                    <path fill-rule="evenodd"
                                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                </svg> <span>Sign In</span>
                            </a>
                        @endguest

                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-3 py-1.5 bg-slate-200 dark:bg-slate-900 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-box-arrow-in-right size-5" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                        <path fill-rule="evenodd"
                                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg> <span>Sign Out</span>
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<nav class="bg-white dark:bg-slate-800 sm:px-6 lg:px-8 py-3 flex items-center">
    @if (!request()->routeIs('home'))
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-list-ul" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                </svg>
                <span>Category</span>
            </button>

            <div x-show="open" x-transition x-cloak @click.outside="open = false"
                class="absolute top-full mt-6 left-0 min-w-[250px] shadow-md border border-slate-300 dark:border-slate-700">
                <x-categories-navigation />
            </div>
        </div>
    @endif

    <div class="ms-auto flex items-center gap-3">
        <a href="{{ route('home') }}" @class(['text-black dark:text-white' => request()->routeIs('home')])>Home</a>
        <a href="">Products</a>
        <a href="">wishList</a>
    </div>

</nav>
