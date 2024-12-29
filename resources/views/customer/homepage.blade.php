<x-customer-layout>
    <div class="py-12" x-data="homepage">

        <div class="sm:px-6 lg:px-8">

            <div class="grid grid-cols-5 gap-7">
                <x-categories-navigation class="col-span-1" />


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
                        slidesPerView: 1,
                        spaceBetween: 28,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            768: {
                                slidesPerView: 3,
                                spaceBetween: 40,
                            },
                            1024: {
                                slidesPerView: 4,
                                spaceBetween: 50,
                            },
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
                    <img src="https://img.freepik.com/free-psd/summer-special-fashion-sale-instagram-post-template_120329-1504.jpg?t=st=1735191186~exp=1735194786~hmac=716c5339027f7f27f1fcfb4a6ab469e0b3b6f3d8468e8e8ebbc18af45ec6160c&w=740"
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
                                slidesPerView: 1,
                                spaceBetween: 28,
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                                breakpoints: {
                                    640: {
                                        slidesPerView: 2,
                                        spaceBetween: 20,
                                    },
                                    768: {
                                        slidesPerView: 3,
                                        spaceBetween: 40,
                                    },
                                    1024: {
                                        slidesPerView: 4,
                                        spaceBetween: 50,
                                    },
                                },
                            });
                        }
                    }
                })
            })
        </script>
    @endpush
</x-customer-layout>
