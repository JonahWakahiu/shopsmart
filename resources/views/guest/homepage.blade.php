<x-index-layout>
    <div x-data="homepage">

        <div class="sm:px-6 lg:px-8">

            <div class="grid grid-cols-5 py-7 gap-7">
                <div class="col-span-1  dark:text-300 flex flex-col text-sm bg-white dark:bg-slate-800 rounded-md">
                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-phone" viewBox="0 0 16 16">
                            <path
                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg>
                        <span>Phones & Tablets</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-tv" viewBox="0 0 16 16">
                            <path
                                d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5M13.991 3l.024.001a1.5 1.5 0 0 1 .538.143.76.76 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.5 1.5 0 0 1-.143.538.76.76 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.5 1.5 0 0 1-.538-.143.76.76 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.5 1.5 0 0 1 .143-.538.76.76 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2" />
                        </svg>
                        <span>TVS & Audio</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house-gear" viewBox="0 0 16 16">
                            <path
                                d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                            <path
                                d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                        </svg>
                        <span>Appliances</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-pulse" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857q.09.083.176.171a3 3 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01zM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5" />
                            <path
                                d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162z" />
                        </svg>
                        <span>Health & Beauty</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-door-open" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
                            <path
                                d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z" />
                        </svg>
                        <span>Home & office</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-slate-700 dark:fill-slate-300"
                            viewBox="0 0 640 512">
                            <path
                                d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0l12.6 0c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7 480 448c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-250.3-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0l12.6 0z" />
                        </svg>
                        <span>Fashion</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pc-display" viewBox="0 0 16 16">
                            <path
                                d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z" />
                        </svg>
                        <span>Computing</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-basket2" viewBox="0 0 16 16">
                            <path
                                d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0z" />
                            <path
                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6z" />
                        </svg>
                        <span>Supermarket</span>
                    </button>

                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-slate-700 dark:fill-slate-300"
                            viewBox="0 0 448 512">
                            <path
                                d="M152 88a72 72 0 1 1 144 0A72 72 0 1 1 152 88zM39.7 144.5c13-17.9 38-21.8 55.9-8.8L131.8 162c26.8 19.5 59.1 30 92.2 30s65.4-10.5 92.2-30l36.2-26.4c17.9-13 42.9-9 55.9 8.8s9 42.9-8.8 55.9l-36.2 26.4c-13.6 9.9-28.1 18.2-43.3 25l0 36.3-192 0 0-36.3c-15.2-6.7-29.7-15.1-43.3-25L48.5 200.3c-17.9-13-21.8-38-8.8-55.9zm89.8 184.8l60.6 53-26 37.2 24.3 24.3c15.6 15.6 15.6 40.9 0 56.6s-40.9 15.6-56.6 0l-48-48C70 438.6 68.1 417 79.2 401.1l50.2-71.8zm128.5 53l60.6-53 50.2 71.8c11.1 15.9 9.2 37.5-4.5 51.2l-48 48c-15.6 15.6-40.9 15.6-56.6 0s-15.6-40.9 0-56.6L284 419.4l-26-37.2z" />
                        </svg>
                        <span>Baby Products</span>
                    </button>
                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-slate-700 dark:fill-slate-300"
                            viewBox="0 0 640 512">
                            <path
                                d="M96 64c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32l0 160 0 64 0 160c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-64-32 0c-17.7 0-32-14.3-32-32l0-64c-17.7 0-32-14.3-32-32s14.3-32 32-32l0-64c0-17.7 14.3-32 32-32l32 0 0-64zm448 0l0 64 32 0c17.7 0 32 14.3 32 32l0 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l0 64c0 17.7-14.3 32-32 32l-32 0 0 64c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-160 0-64 0-160c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32zM416 224l0 64-192 0 0-64 192 0z" />
                        </svg>
                        <span>Sporting Goods</span>
                    </button>
                    <button class="flex items-center gap-3 text-sm capitalize hover:text-orange-500 py-2 px-3">

                        <span
                            class="rounded-full p-0.5  flex items-center justify-center border border-slate-700 dark:border-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-three-dots size-3"
                                viewBox="0 0 16 16">
                                <path
                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                            </svg>
                        </span>
                        <span>Other Categories</span>
                    </button>
                </div>

                <div class="col-span-3 h-[65svh] rounded-md overflow-hidden">
                    <div class="swiper h-full" x-init="new Swiper($el, {
                        loop: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                        },
                    });">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://img.freepik.com/free-psd/black-friday-super-sale-social-media-banner-template_106176-1480.jpg?t=st=1735072322~exp=1735075922~hmac=87f835123e8ea5dfcc40c497c3df7f1fa3c797a72e0a2cfddfd29a988d17338c&w=740"
                                    alt="" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://img.freepik.com/free-psd/black-friday-super-sale-social-media-banner-template_120329-2129.jpg?t=st=1735072381~exp=1735075981~hmac=db45ecebbcdc09d263fc2e58cc64928ac1c4d5c35da207ec1f2985cfdbc0eb3a&w=740"
                                    alt="" class="w-full h-full object-cover object-center">
                            </div>

                            <div class="swiper-slide">
                                <img src="https://img.freepik.com/free-psd/black-friday-super-sale-social-media-banner-template_106176-1505.jpg?t=st=1735072285~exp=1735075885~hmac=ac15e5c2d73652acb6c505b57f8a672914e825f7bfd53bc723bd1686cdc40bac&w=740"
                                    alt="" class="w-full h-full object-cover object-center">
                            </div>

                            <div class="swiper-slide">
                                <img src="https://img.freepik.com/free-psd/black-friday-super-sale-social-media-banner-instagram-post-template_106176-4509.jpg?t=st=1735072473~exp=1735076073~hmac=345e6125e0c5d159508fa66c550016f4a62d6e008c991b6b81422debc3ac476b&w=740"
                                    alt="" class="w-full h-full object-cover object-center">
                            </div>

                            <div class="swiper-slide">
                                <img src="https://img.freepik.com/free-psd/black-friday-super-sale-web-banner-template_120329-3845.jpg?ga=GA1.2.1021615266.1722817742&semt=ais_hybrid"
                                    alt="" class="w-full h-full object-cover object-center">
                            </div>

                            <div class="swiper-slide">
                                <img src="https://img.freepik.com/free-psd/black-friday-icon-isolated-3d-render-illustration_47987-16504.jpg?t=st=1735072504~exp=1735076104~hmac=a69819c64c868d8747b069bef71b1a2de71e0694c445f716d9be5d860b9b2b79&w=740"
                                    alt="" class="w-full h-full object-cover object-center">
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-chevron-right size-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-chevron-left size-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                            </svg>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="bg-white dark:bg-slate-800 p-4 rounded-md">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-question-circle size-6 text-orange-500" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Help Center</p>
                                <p class="text-xs">Guide to Customer care</p>
                            </div>
                        </div>

                        <div class="flex items-center mt-3 gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-fire size-6 text-yellow-500" viewBox="0 0 16 16">
                                <path
                                    d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium">Hot Deals</p>
                                <p class="text-xs">Updated Daily</p>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5">
                        <div style="width:100%;height:0;padding-bottom:100%;position:relative;">
                            <iframe src="https://giphy.com/embed/dt5KH1rzBYEr8tijlS" width="100%" height="100%"
                                style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- top deals -->
            <div class="my-5">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-lightning-charge-fill size-6 fill-yellow-500" viewBox="0 0 16 16">
                        <path
                            d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                    </svg>
                    <span class="font-semibold text-xl">Top Deals today</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-lightning-charge-fill size-6 fill-yellow-500" viewBox="0 0 16 16">
                        <path
                            d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-5 gap-7">
                <div class="col-span-4">
                    <div class="swiper" x-init="new Swiper($el, {
                        slidesPerView: 4,
                        spaceBetween: 28,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    })">
                        <div class="swiper-wrapper">
                            <template x-for="topDealProduct in topDealProducts" :key="topDealProduct.id">
                                <div class="swiper-slide group">
                                    <a :href="`{{ route('products.show', '__id__') }}`.replace('__id__', topDealProduct.id)"
                                        class="">
                                        <div class="w-full h-48 rounded-md overflow-hidden shadow-md">
                                            <img :src="topDealProduct.oldest_image.url" :alt="topDealProduct.name"
                                                class="object-cover object-center w-full h-full">
                                        </div>
                                        <div class="pt-3">
                                            <p class="whitespace-normal text-sm font-semibold group-hover:text-blue-600 dark:group-hover:text-blue-400  group-hover:underline underline-offset-1"
                                                x-text="topDealProduct.name"></p>

                                            <div>
                                                <div class="flex items-center ">
                                                    <template x-for="i in 5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="size-4 fill-amber-500 text-amber-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                        </svg>
                                                    </template>
                                                </div>
                                                <span
                                                    class="text-xs font-semibold text-slate-600 dark:text-slate-400">(6548
                                                    People
                                                    rated)</span>
                                            </div>

                                            <div class="flex items-center gap-4">
                                                <p x-text="'$' + (topDealProduct.price - topDealProduct.discount).toFixed(2)"
                                                    class="font-semibold text-lg mt-4"></p>
                                                <template x-if="topDealProduct.discount > 0">
                                                    <p x-text="'$' + topDealProduct.discount"
                                                        class="line-through text-lg mt-4 text-slate-600 dark:text-slate-400">
                                                    </p>
                                                </template>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </template>
                        </div>

                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-chevron-right size-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-chevron-left size-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="col-span-1 h-[60svh] rounded-md overflow-hidden">
                    <img src="https://img.freepik.com/free-psd/special-offer-black-friday-social-media-banner-template_120329-1081.jpg?ga=GA1.2.1021615266.1722817742&semt=ais_hybrid"
                        alt="" class="object-cover object-center h-full w-full">
                </div>
            </div>


            <!-- top electronics -->
            <div class="my-5">
                <p class="font-semibold text-xl">Top Electronics</p>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <template x-for="topElectronic in topElectronics">

                        <div class="swiper-slide group">
                            <a :href="`{{ route('products.show', '__id__') }}`.replace('__id__', topElectronic.id)">
                                <div class="w-full h-48 rounded-md overflow-hidden shadow-md">
                                    <img :src="topElectronic.oldest_image.url" :alt="topElectronic.name"
                                        class="object-cover object-center w-full h-full">
                                </div>
                                <div class="pt-3">
                                    <p class="whitespace-normal text-sm font-semibold group-hover:text-blue-600 dark:group-hover:text-blue-400 group-hover:underline underline-offset-1"
                                        x-text="topElectronic.name"></p>

                                    <div>
                                        <div class="flex items-center ">
                                            <template x-for="i in 5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4 fill-amber-500 text-amber-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>
                                            </template>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-600 dark:text-slate-400">(6548
                                            People rated)</span>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <p x-text="'$' + (topElectronic.price - topElectronic.discount).toFixed(2)"
                                            class="font-semibold text-lg mt-4"></p>
                                        <template x-if="topElectronic.discount > 0">
                                            <p x-text="'$' + topElectronic.discount"
                                                class="line-through text-sm mt-4 text-slate-600 dark:text-slate-400">
                                            </p>
                                        </template>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </template>
                </div>
                <div class="swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-right size-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-left size-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                    </svg>
                </div>
            </div>

            <!-- Best Offers -->
            <div class="my-5">
                <p class="font-semibold text-xl">Best Offers</p>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <template x-for="bestOfferProduct in bestOfferProducts">
                        <div class="swiper-slide group">
                            <a :href="`{{ route('products.show', '__id__') }}`.replace('__id__', bestOfferProduct.id)">
                                <div class="w-full h-48 rounded-md overflow-hidden shadow-md">
                                    <img :src="bestOfferProduct.oldest_image.url" :alt="bestOfferProduct.name"
                                        class="object-cover object-center w-full h-full">
                                </div>
                                <div class="pt-3">
                                    <p class="whitespace-normal text-sm font-semibold group-hover:text-blue-600 dark:group-hover:text-blue-400  group-hover:underline underline-offset-1"
                                        x-text="bestOfferProduct.name"></p>

                                    <div>
                                        <div class="flex items-center ">
                                            <template x-for="i in 5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4 fill-amber-500 text-amber-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>
                                            </template>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-600 dark:text-slate-400">(6548
                                            People rated)</span>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <p x-text="'$' + (bestOfferProduct.price - bestOfferProduct.discount).toFixed(2)"
                                            class="font-semibold text-lg mt-4"></p>
                                        <p x-text="'$' + bestOfferProduct.discount"
                                            class="line-through text-sm mt-4 text-slate-600 dark:text-slate-400"></p>
                                    </div>

                                </div>
                            </a>

                        </div>
                    </template>
                </div>
                <div class="swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-right size-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-left size-4"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('homepage', function() {
                    return {
                        topDealProducts: {},
                        bestOfferProducts: {},
                        topElectronics: {},
                        categories: {},


                        async getProducts() {
                            try {
                                const url = '{{ route('products/list') }}';

                                const response = await axios.get(url);

                                if (response.status == 200) {
                                    this.topDealProducts = response.data.topDealProducts;
                                    this.bestOfferProducts = response.data.bestOfferProducts;
                                    this.topElectronics = response.data.topElectronics;
                                    this.categories = response.data.categories;
                                    console.log(response);
                                }
                            } catch (error) {
                                console.log(error)
                            }
                        },

                        init() {
                            this.getProducts();

                            var swiper = new Swiper(".mySwiper", {
                                slidesPerView: 5,
                                spaceBetween: 28,
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                            });
                        }
                    }
                })
            })
        </script>
    @endpush
</x-index-layout>
