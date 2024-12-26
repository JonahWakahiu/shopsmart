<x-index-layout>
    <div class="py-12" x-data="viewProduct">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h6 class="font-semibold text-2xl text-black dark:text-white mb-4">Product Page</h6>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div class="space-y-5">
                    <div class="relative w-full min-h-[60svh] rounded-md overflow-hidden">
                        <template x-for="(image , index) in product.images" :key="image.id">
                            <div x-show="currentImage === index + 1" class="absolute inset-0">
                                <img :src="image.url" :alt="image.url"
                                    class="absolute w-full h-full inset-0 object-cover ">
                            </div>
                        </template>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <template x-for="(image, index) in product.images" :key="image.id">
                            <div @click="currentImage = index + 1"
                                class="rounded-md size-16 overflow-hidden cursor-pointer">
                                <img :src="image.url" :alt="image.url"
                                    class="w-full h-full object-cover object-center">
                            </div>
                        </template>
                    </div>


                    <div class="flex items-center space-x-5">
                        <button
                            class="w-full min-w-fit px-5 rounded-3xl py-2 border border-orange-500 text-orange-500 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-suit-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                            </svg>
                            <span>Add to wishlist</span>
                        </button>

                        <template x-if="product.variations < 1">
                            <button
                                @click="$store.cart.addProduct({
                                    id:product.id,
                                    name:product.name,
                                    oldest_image: product.oldest_image.url || '',
                                    price: product.price,
                                    stock_quantity: product.stock_quantity,
                                    discount: product.discount || 0,
                                    userSelectedQuantity: quantity
                                    })"
                                class="w-full min-w-fit px-5 rounded-3xl py-2 bg-orange-500 text-white hover:bg-orange-500/80 flex items-center space-x-2 justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                </svg>
                                <span>Add to cart</span>
                            </button>
                        </template>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <div class="flex items-center gap-1">
                        <template x-for="i in 5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 fill-amber-500 text-amber-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </template>

                        <span>6548 People rated and reviewed</span>
                    </div>
                    <p x-text="product.name" class="text-2xl font-semibold"></p>

                    <div>
                        <p class="">Price</p>
                        <div class="flex items-baseline gap-5">
                            <p x-text="'$' +( product.price - product.discount).toFixed(2)"
                                class="text-4xl font-semibold">
                            </p>

                            <template x-if="product.discount">
                                <p x-text="'$'+product.price"
                                    class="text-lg font-medium line-through text-slate-600 dark:text-slate-400">
                                </p>
                            </template>
                        </div>
                    </div>

                    <div>
                        <template x-if="product.stock_quantity > 0">
                            <span class="text-green-500">In Stock</span>
                        </template>
                        <template x-if="product.stock_quantity == 0">
                            <span class="text-red-500">Out Of Stock</span>
                        </template>
                    </div>
                    <p x-text="product.short_description"></p>
                    <div class="border-b border-slate-300 pt-5"></div>

                    <template x-if="groupedVariations">
                        <div>
                            <p class="text-lg font-medium mb-2">Variation Available</p>

                            <div class="flex items-center flex-shrink-0 gap-3">
                                <template x-for="(variations, groupName) in groupedVariations" :key="groupName">
                                    <button @click="showModal = true, selectedVariationGroup = variations"
                                        x-text="groupName"
                                        class="text-xs p-2 border border-slate-300 dark:border-slate-700"></button>
                                </template>
                            </div>
                        </div>
                    </template>

                    <template x-if="product.variations < 1">

                        <div>
                            <p>Quantity</p>

                            <div class="flex items-center space-x-2">
                                <button @click="decreaseQuantity"
                                    class="bg-slate-100 dark:bg-slate-700 rounded-md p-1 shadow-md border border-slate-200 flex items-center justify-center text-blue-500"
                                    type="button">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-dash size-5" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                    </svg>
                                </button>

                                <div class="p-2 text-sm font-medium" x-text="quantity"></div>

                                <button @click="increaseQuantity"
                                    class="bg-slate-100 dark:bg-slate-700  rounded-md p-1 shadow-md border border-slate-200  flex items-center justify-center text-blue-500"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-plus size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>

                </div>
            </div>

            <div class="w-full mt-5 max-w-2xl">
                <div class="flex gap-2 overflow-x-auto border-b border-slate-300 dark:border-slate-700">
                    <button type="button" @click="selectedTab = 'description'"
                        :class="selectedTab === 'description' ?
                            'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' :
                            'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'"
                        class="h-min px-4 py-2 text-sm">Description</button>

                    <button type="button" @click="selectedTab = 'specification'"
                        :class="selectedTab === 'specification' ?
                            'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' :
                            'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'"
                        class="h-min px-4 py-2 text-sm">Specification</button>

                    <button type="button" @click="selectedTab = 'ratings'"
                        :class="selectedTab === 'ratings' ?
                            'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' :
                            'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'"
                        class="h-min px-4 py-2 text-sm">Rating & reviews</button>
                </div>

                <div class="px-2 py-4 text-slate-700 dark:text-slate-300">
                    <div x-cloak x-show="selectedTab == 'description'">
                        <div x-html="product.description"></div>
                    </div>
                    <div x-cloak x-show="selectedTab == 'specification'">
                    </div>
                    <div x-cloak x-show="selectedTab == 'ratings'">
                    </div>
                </div>
            </div>

            <!-- Similar products -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <template x-for="similarProduct in similarProducts">
                        <div class="swiper-slide group">
                            <a :href="`{{ route('products.show', ':id') }}`.replace(':id', similarProduct.id)">

                                <div class="w-full h-48 rounded-md overflow-hidden shadow-md">
                                    <img :src="similarProduct.oldest_image.url" :alt="similarProduct.name"
                                        class="object-cover object-center w-full h-full">
                                </div>
                                <div class="pt-3">
                                    <p class="whitespace-normal text-sm font-semibold group-hover:text-blue-600 dark:group-hover:text-blue-500 capitalize  group-hover:underline underline-offset-1"
                                        x-text="similarProduct.name"></p>

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

                                    <p x-text="'$' + similarProduct.price" class="font-semibold text-lg mt-4"></p>
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


        {{-- show modal --}}
        <div x-cloak x-show="showModal" x-transtion.opacity.duration.200ms x-trap.inert.noscroll="showModal"
            @click.self="closeModal"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blue-md sm:items-center lg:p-8">

            <!-- modal dialog -->
            <div x-show="showModal"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                class="w-full p-7 pt-5  max-w-lg rounded-xl border border-slate-300 bg-white text-slate-700 dark:border-slate-800 dark:bg-slate-700 dark:text-slate-300 relative">

                <button
                    class="absolute right-0 top-0 -translate-y-1/2 bg-slate-100 dark:bg-slate-800 shadow-md translate-x-1/2 p-1.5 rounded-md"
                    @click="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                        stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <h6 class="font-semibold text-xl text-slate-900 dark:text-slate-100 mb-2">
                    Please select Variation
                </h6>

                <div class="space-y-2">
                    <template x-for="variation in selectedVariationGroup" :key="variation.id">
                        <div class="flex items-center justify-between" x-data="{
                            userSelectedQuantity: 0,
                            decreaseVariationQuantity() {
                                if (this.userSelectedQuantity > 0) {
                                    this.userSelectedQuantity--;
                                    this.$store.cart.removeProduct(product.id, variation.id, variation.value);
                                }
                            },
                        
                            increaseVariationQuantity() {
                                if (this.userSelectedQuantity < variation.stock_quantity) {
                                    this.userSelectedQuantity++;
                        
                                    this.$store.cart.addProduct({
                                        id: product.id,
                                        name: product.name,
                                        oldest_image: product.oldest_image.url || '',
                                        price: variation.price,
                                        stock_quantity: variation.stock_quantity,
                                        discount: product.discount || 0,
                                        variation_id: variation.id,
                                        variation_type: variation.type,
                                        variation_value: variation.value,
                                        userSelectedQuantity: this.userSelectedQuantity,
                                    });
                                }
                            }
                        }">
                            <div>
                                <p x-text="variation.value" class=" font-medium"></p>
                                <p x-text="'$'+variation.price" class=""></p>
                                <template x-if="variation.stock_quantity > 1">
                                    <p class="text-xs">In Stock</p>
                                </template>

                                <template x-if="variation.stock_quantity < 2">
                                    <div class="flex items-baseline gap-1 text-red-500 text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="bi bi-exclamation-triangle size-3" viewBox="0 0 16 16">
                                            <path
                                                d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z" />
                                            <path
                                                d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                        </svg>
                                        <span x-text="variation.stock_quantity"></span>
                                        <span>units left</span>
                                    </div>
                                </template>
                            </div>

                            <div class="flex items-center space-x-2">
                                <button type="button" @click="decreaseVariationQuantity"
                                    class="bg-slate-100 dark:bg-slate-800  rounded-md p-2 shadow-md border border-slate-200 dark:border-slate-800 flex items-center justify-center text-blue-500"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-dash size-5" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                    </svg>
                                </button>

                                <div class="p-2" x-text="userSelectedQuantity"></div>

                                <button type="button" @click="increaseVariationQuantity"
                                    class="bg-slate-100 dark:bg-slate-800  rounded-md p-2 shadow-md border border-slate-200 dark:border-slate-800 flex items-center justify-center text-blue-500"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-plus size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>

                </div>

                <div class="my-2.5 border-b border-slate-300 dark:border-slate-700"></div>

                <div class="flex items-center space-x-5">
                    <a href="{{ route('home') }}"
                        class="cursor-pointer w-full min-w-fit px-5 rounded-md py-2 border border-orange-500 text-orange-500 flex items-center justify-center space-x-2">
                        <span>Continue Shopping</span>
                    </a>
                    <a href="{{ route('cart') }}"
                        class="cursor-pointer w-full min-w-fit px-5 rounded-md py-2 bg-orange-500 text-white hover:bg-orange-500/80 flex items-center space-x-2 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                        <span>Go to cart</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('viewProduct', () => ({
                    product: {},
                    groupedVariations: {},
                    currentImage: 1,
                    selectedTab: 'description',
                    similarProducts: {},
                    quantity: 1,
                    variationQuantity: 0,
                    showModal: false,
                    selectedVariationGroup: null,

                    closeModal() {
                        this.showModal = false;
                        this.selectedVariationGroup = null;
                    },

                    increaseQuantity() {
                        if (this.quantity < this.product.stock_quantity) {
                            this.quantity++;
                        }
                    },

                    decreaseQuantity() {
                        if (this.quantity > 1) {
                            this.quantity--;
                        }
                    },

                    init() {
                        this.product = @json($product);
                        this.similarProducts = @json($similarProducts);
                        this.groupedVariations = @json($groupedVariations);

                        var swiper = new Swiper(".mySwiper", {
                            slidesPerView: 5,
                            spaceBetween: 30,
                            navigation: {
                                nextEl: ".swiper-button-next",
                                prevEl: ".swiper-button-prev",
                            },
                        });
                    }
                }))
            })
        </script>
    @endpush
    </x-app-layout>
