<div
    {{ $attributes->merge(['class' => 'col-span-1  dark:text-300 flex flex-col text-sm bg-white dark:bg-slate-800 rounded-md']) }}>
    <a href="{{ route('category.products.show', 'Phones & Tablets') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Phones & Tablets'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone"
            viewBox="0 0 16 16">
            <path
                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
        </svg>
        <span>Phones & Tablets</span>
    </a>

    <a href="{{ route('category.products.show', 'TVS & Audio') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/TVS & Audio'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tv"
            viewBox="0 0 16 16">
            <path
                d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5M13.991 3l.024.001a1.5 1.5 0 0 1 .538.143.76.76 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.5 1.5 0 0 1-.143.538.76.76 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.5 1.5 0 0 1-.538-.143.76.76 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.5 1.5 0 0 1 .143-.538.76.76 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2" />
        </svg>
        <span>TVS & Audio</span>
    </a>

    <a href="{{ route('category.products.show', 'Appliances') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Appliances'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-house-gear" viewBox="0 0 16 16">
            <path
                d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
            <path
                d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
        </svg>
        <span>Appliances</span>
    </a>

    <a href="{{ route('category.products.show', 'Health & Beauty') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Health & Beauty'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-heart-pulse" viewBox="0 0 16 16">
            <path
                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857q.09.083.176.171a3 3 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01zM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5" />
            <path
                d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162z" />
        </svg>
        <span>Health & Beauty</span>
    </a>

    <a href="{{ route('category.products.show', 'Home & Office') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Home & Office'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-door-open" viewBox="0 0 16 16">
            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
            <path
                d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z" />
        </svg>
        <span>Home & Office</span>
    </a>

    <a href="{{ route('category.products.show', 'Fashion') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Computing'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-slate-700 dark:fill-slate-300" viewBox="0 0 640 512">
            <path
                d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0l12.6 0c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7 480 448c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-250.3-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0l12.6 0z" />
        </svg>
        <span>Fashion</span>
    </a>

    <a href="{{ route('category.products.show', 'Computing') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Computing'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-pc-display" viewBox="0 0 16 16">
            <path
                d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z" />
        </svg>
        <span>Computing</span>
    </a>

    <a href="{{ route('category.products.show', 'Supermarket') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Supermarket'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2"
            viewBox="0 0 16 16">
            <path
                d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0z" />
            <path
                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6z" />
        </svg>
        <span>Supermarket</span>
    </a>

    <a href="{{ route('category.products.show', 'Baby Products') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Baby Products'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-slate-700 dark:fill-slate-300" viewBox="0 0 448 512">
            <path
                d="M152 88a72 72 0 1 1 144 0A72 72 0 1 1 152 88zM39.7 144.5c13-17.9 38-21.8 55.9-8.8L131.8 162c26.8 19.5 59.1 30 92.2 30s65.4-10.5 92.2-30l36.2-26.4c17.9-13 42.9-9 55.9 8.8s9 42.9-8.8 55.9l-36.2 26.4c-13.6 9.9-28.1 18.2-43.3 25l0 36.3-192 0 0-36.3c-15.2-6.7-29.7-15.1-43.3-25L48.5 200.3c-17.9-13-21.8-38-8.8-55.9zm89.8 184.8l60.6 53-26 37.2 24.3 24.3c15.6 15.6 15.6 40.9 0 56.6s-40.9 15.6-56.6 0l-48-48C70 438.6 68.1 417 79.2 401.1l50.2-71.8zm128.5 53l60.6-53 50.2 71.8c11.1 15.9 9.2 37.5-4.5 51.2l-48 48c-15.6 15.6-40.9 15.6-56.6 0s-15.6-40.9 0-56.6L284 419.4l-26-37.2z" />
        </svg>
        <span>Baby Products</span>
    </a>

    <a href="{{ route('category.products.show', 'Sporting Goods') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('category/Sporting Goods'),
    ])>
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-slate-700 dark:fill-slate-300" viewBox="0 0 640 512">
            <path
                d="M96 64c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32l0 160 0 64 0 160c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-64-32 0c-17.7 0-32-14.3-32-32l0-64c-17.7 0-32-14.3-32-32s14.3-32 32-32l0-64c0-17.7 14.3-32 32-32l32 0 0-64zm448 0l0 64 32 0c17.7 0 32 14.3 32 32l0 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l0 64c0 17.7-14.3 32-32 32l-32 0 0 64c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-160 0-64 0-160c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32zM416 224l0 64-192 0 0-64 192 0z" />
        </svg>
        <span>Sporting Goods</span>
    </a>

    <a href="{{ route('category.products.show', 'Others') }}" @class([
        'flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3',
        'text-orange-500' => request()->is('cOthers'),
    ])>

        <span
            class="rounded-full p-0.5  flex items-center justify-center border border-slate-700 dark:border-slate-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-three-dots size-3"
                viewBox="0 0 16 16">
                <path
                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
            </svg>
        </span>
        <span>Other Categories</span>
    </a>
</div>
