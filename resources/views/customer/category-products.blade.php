<x-customer-layout>
    <div class="py-12" x-data="categoryProduct">
        <div class="sm:px-6 lg:px-8">

            <div
                class="text-center py-2 px-5 bg-slate-900 dark:bg-slate-100 text-white text-lg font-medium capitalize rounded-md dark:text-black">
                <span x-text="category"></span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7 mt-7">
                <template x-for="product in products" :key="product.id">
                    <div class="group">
                        <a :href="`{{ route('products.show', '__id__') }}`.replace('__id__', product.id)" class="">
                            <div class="w-full h-48 rounded-md overflow-hidden shadow-md">
                                <img :src="product.oldest_image.url" :alt="product.name"
                                    class="object-cover object-center w-full h-full">
                            </div>
                            <div class="pt-3">
                                <p class="whitespace-normal text-sm font-semibold group-hover:text-blue-600 dark:group-hover:text-blue-400  group-hover:underline underline-offset-1"
                                    x-text="product.name"></p>

                                <div>
                                    <div class="flex items-center ">
                                        <template x-for="i in 5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-4 fill-amber-500 text-amber-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                            </svg>
                                        </template>
                                    </div>
                                    <span class="text-xs font-semibold text-slate-600 dark:text-slate-400">(6548
                                        People
                                        rated)</span>
                                </div>

                                <div class="flex items-center gap-4">
                                    <p x-text="'$' + (product.price - product.discount).toFixed(2)"
                                        class="font-semibold text-lg mt-4"></p>
                                    <template x-if="product.discount > 0">
                                        <p x-text="'$' + product.discount"
                                            class="line-through text-lg mt-4 text-slate-600 dark:text-slate-400">
                                        </p>
                                    </template>
                                </div>
                            </div>
                        </a>
                    </div>
                </template>


            </div>

            <div class="flex justify-center mt-10">
                {{-- pagination --}}
                <nav>
                    <ul class="flex flex-shrink-0 items-center gap-2 text-sm font-medium">

                        <li>
                            <button type="button" @click="goToPage(1)"
                                class="flex items-center justify-center rounded-xl p-1 text-slate-700 hover:text-blue-700 dark:text-slate-300 dark:hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                                </svg>
                            </button>
                        </li>

                        <li>
                            <button type="button" @click="prevPage"
                                class="flex items-center rounded-xl p-1 text-slate-700 hover:text-blue-700 dark:text-slate-300 dark:hover:text-blue-600">Previous
                            </button>
                        </li>

                        <template x-if="currentPage > 4">
                            <li>
                                <button type="button"
                                    class="flex items-center justify-center rounded-xl p-1 text-slate-700 hover:text-blue-700 dark:text-slate-300 dark:hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" aria-hidden="true" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </button>
                            </li>
                        </template>

                        <template x-for="page in visiblePages" :key="page">
                            <li>
                                <button type="button" @click="goToPage(page)"
                                    class="flex size-6 items-center justify-center rounded-xl p-1 text-slate-700 hover:text-blue-700 dark:text-slate-300 dark:hover:text-blue-600"
                                    :class="{
                                        'bg-blue-700 dark:bg-blue-600 hover:bg-blue-700/80 dark:hover:bg-blue-600/80 text-white hover:text-white': currentPage ===
                                            page
                                    }"
                                    x-text="page">
                                </button>
                            </li>
                        </template>

                        <template x-if="currentPage < totalPages - 3">
                            <li>
                                <button type="button"
                                    class="flex items-center justify-center rounded-xl p-1 text-slate-700 hover:text-blue-700 dark:text-slate-300 dark:hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" aria-hidden="true" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </button>
                            </li>
                        </template>

                        <li>
                            <button type="button" @click="nextPage"
                                class="flex items-center rounded-xl p-1 text-slate-700 hover:text-blue-700 dark:text-slate-300 dark:hover:text-blue-600">Next</button>
                        </li>

                        <li>
                            <button type="button" @click="goToPage(totalPages)"
                                class="flex items-center rounded-xl p-1 text-slate-700 hover:text-blue-700 dark:text-slate-300 dark:hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </nav>

            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('categoryProduct', () => ({
                    category: '',
                    products: {},

                    // pagination
                    from: 1,
                    to: 10,
                    total: 0,
                    currentPage: 1,
                    totalPages: 1,

                    async getCategoryProducts() {
                        try {
                            const url = `{{ route('category.products.list', '__category__') }}`.replace(
                                '__category__', this.category);

                            const response = await axios.get(url, {
                                params: {
                                    page: this.currentPage,
                                }
                            });

                            if (response.status === 200) {
                                this.products = response.data.data;

                                this.from = response.data.from;
                                this.to = response.data.to;
                                this.total = response.data.total;
                                this.currentPage = response.data.current_page;
                                this.totalPages = response.data.last_page;
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    prevPage() {
                        if (this.currentPage > 1) {
                            this.currentPage--;
                            this.getCategoryProducts();
                        }
                    },

                    nextPage() {
                        if (this.currentPage < this.totalPages) {
                            this.currentPage++;
                            this.getCategoryProducts();
                        }
                    },

                    goToPage(page) {
                        this.currentPage = page;
                        this.getCategoryProducts();
                    },

                    visiblePages() {
                        const pages = [];
                        const delta = 1;
                        const start = Math.max(1, this.currentPage - delta);
                        const end = Math.min(this.totalPages, this.currentPage + delta);

                        for (let i = start; i <= end; i++) {
                            pages.push(i);
                        }
                        return pages;
                    },

                    init() {
                        this.category = @json($category);
                        this.getCategoryProducts();
                    }
                }))
            })
        </script>
    @endpush
</x-customer-layout>
