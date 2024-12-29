<x-app-layout>


    <div x-data="productsManagement" class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h6 class="font-semibold text-2xl text-black dark:text-white mb-4">Products</h6>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <x-select-input class="w-full capitalize" x-model="filterByStatus" @change="getProducts">
                        <option value="" selected>Selected</option>
                        <template x-for="status in ['sheduled', 'published', 'inactive']" :key="status">
                            <option :value="status" x-text="status"></option>
                        </template>
                    </x-select-input>
                </div>

                <div>
                    <x-select-input class="w-full capitalize" x-model="filterByCategory" @change="getProducts">
                        <option value="" selected>Category</option>
                        <template x-for="categoryName in categoryNames" :key="categoryName">
                            <option :value="categoryName" x-text="categoryName"></option>
                        </template>
                    </x-select-input>
                </div>

                <div>
                    <x-select-input class="w-full capitalize" x-model="filterByStock" @change="getProducts">
                        <option value="" selected>Stock</option>
                        <template x-for="stock in ['Out Of Stock', 'In Stock']" :key="stock">
                            <option :value="stock" x-text="stock"></option>
                        </template>
                    </x-select-input>
                </div>
            </div>

            <div class="flex items-center justify-between py-4">

                <x-search-input x-model="q" class="min-w-[250px]" />

                <div>
                    <a href="{{ route('admin.products.create') }}"
                        class="flex items-center gap-2 text-sm bg-blue-500 hover:bg-blue-500/80 px-5 py-1.5 rounded-md text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus size-5 shrink-0"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <span>Add Product</span></a>
                </div>
            </div>
        </div>

        {{-- products list --}}
        <div class="w-full sm:px-6 lg:px-8 border-y border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800">

            <div
                class="overflow-x-hidden hover:overflow-x-auto border-b-[10px] border-transparent hover:border-none transition-transform duration-300  custom-scrollbar ">
                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
                    <thead class="border-b border-slate-300 dark:border-slate-700 text-black dark:text-white">
                        <tr>
                            <th scope="col" class="p-4 whitespace-nowrap">Product</th>
                            <th scope="col" class="p-4 whitespace-nowrap">Price</th>
                            <th scope="col" class="p-4 whitespace-nowrap">Category</th>
                            <th scope="col" class="p-4 whitespace-nowrap">Status</th>
                            <th scope="col" class="p-4 whitespace-nowrap">Stock</th>
                            <th scope="col" class="p-4 whitespace-nowrap">SKU</th>
                            <th scope="col" class="p-4 whitespace-nowrap">Quantity</th>
                            <th scope="col" class="p-4 whitespace-nowrap">Published On</th>
                            <th scope="col" class="p-4 whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                        <template x-for="product in products" :key="product.id">

                            <tr>
                                <td class="p-3 whitespace-nowrap min-w-[250px]">
                                    <a :href="`{{ route('admin.products.show', ':id') }}`.replace(':id', product.id)"
                                        class="flex items-center gap-2.5 min-w-fit">
                                        <img :src="product.oldest_image.url" alt="product.name"
                                            class="size-11 rounded-md object-center object-cover shrink-0">

                                        <div class="whitespace-normal text-blue-500 hover:text-blue-600 hover:underline underline-offset-1"
                                            x-text="product.name"></div>
                                    </a>
                                </td>
                                <td class="p-3 font-semibold whitespace-nowrap" x-text="'$ ' + product.price"></td>
                                <td class="p-3 capitalize whitespace-nowrap" x-text="product.category?.name"></td>
                                <td class="p-3 whitespace-nowrap">
                                    <template x-if="product.status == 'inactive'">
                                        <span
                                            class="px-5 py-1.5 rounded capitalize bg-red-100 text-red-700">Inactive</span>
                                    </template>
                                    <template x-if="product.status == 'publish'">
                                        <span
                                            class="px-5 py-1.5 rounded capitalize bg-green-100 text-green-700">Published</span>
                                    </template>
                                    <template x-if="product.status == 'shedule'">
                                        <span
                                            class="px-5 py-1.5 rounded capitalize bg-sky-100 text-sky-700">Shedule</span>
                                    </template>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <x-toggle ::checked="product.stock_quantity > 0" @change="updateProductStock(product.id, $event)" />
                                </td>
                                <td class="p-3 whitespace-nowrap" x-text="product.sku"></td>
                                <td class="p-3 whitespace-nowrap" x-text="product.stock_quantity"></td>
                                <td class="p-3 whitespace-nowrap"
                                    x-text="new Date(product.published_on).toLocaleString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                    })">
                                </td>
                                <td class="p-3">
                                    <div class="flex items-center gap-4 flex-shrink-0">
                                        <a :href="`{{ route('admin.products.edit', ':id') }}`.replace(':id', product.id)"
                                            class="inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5 text-sky-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>

                                        <button type="button" @click="deleteProduct(product.id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>

                        <template x-if="isLoading">
                            <tr>
                                <td class="p-4 text-center font-medium" colspan="10">Loading...</td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            {{-- table footer --}}
            <div
                class="flex p-4 border-t border-slate-300 dark:border-slate-700 space-x-3 w-full text-slate-700 dark:text-slate-300">

                {{--  --}}
                <div class="flex  items-center space-x-2">
                    <x-input-label for="rowsPerPage" :value="_('Rows per page')" class="shrink-0" />

                    <x-select-input id="rowsPerPage" x-model="rowsPerPage" @change="getProducts">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </x-select-input>
                </div>

                <div class="flex items-center flex-shrink-0 flex-1 justify-between">

                    <div class="text-sm">
                        <span x-text="from" class="text-black dark:text-white"></span>
                        <span>-</span>
                        <span x-text="to" class="text-black dark:text-white"></span>
                        <span>items of</span>
                        <span x-text="total" class="text-black dark:text-white"></span>
                    </div>

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
                                            stroke-width="1.5" aria-hidden="true" stroke="currentColor"
                                            class="w-6 h-6">
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
                                            stroke-width="1.5" aria-hidden="true" stroke="currentColor"
                                            class="w-6 h-6">
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


    </div>


    {{-- scripts --}}
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('productsManagement', function() {
                    return {
                        products: {},
                        categoryNames: {},
                        isLoading: false,

                        // pagination
                        rowsPerPage: 10,
                        from: 1,
                        to: 10,
                        total: 0,
                        currentPage: 1,
                        totalPages: 1,

                        // search
                        q: '',

                        // filter
                        filterByStatus: '',
                        filterByCategory: '',
                        filterByStock: '',


                        async getProducts() {
                            try {
                                this.isLoading = true;

                                const response = await axios.get('{{ route('admin.products.list') }}', {
                                    params: {
                                        rowsPerPage: this.rowsPerPage,
                                        page: this.currentPage,

                                        q: this.q,

                                        filterByStatus: this.filterByStatus,
                                        filterByCategory: this.filterByCategory,
                                        filterByStock: this.filterByStock,
                                    }
                                });

                                if (response.status === 200) {
                                    this.isLoading = false;
                                    this.products = response.data.products.data;
                                    this.categoryNames = response.data.categories;

                                    this.from = response.data.products.from;
                                    this.to = response.data.products.to;
                                    this.total = response.data.products.total;
                                    this.currentPage = response.data.products.current_page;
                                    this.totalPages = response.data.products.last_page;

                                }
                            } catch (error) {
                                console.log(error)
                            }
                        },

                        async updateProductStock(id, event) {
                            try {
                                const response = await axios.put(
                                    `{{ route('admin.products.update.stock', ':id') }}`
                                    .replace(':id', id), {
                                        stock: event.target.checked,
                                    });

                                if (response.status === 200) {
                                    this.getProducts();

                                    this.$dispatch('notify', {
                                        message: 'Product Stock updated successfully!',
                                        type: 'success',
                                        duration: 4000,
                                    });
                                }
                            } catch (error) {
                                console.log(error);

                                this.$dispatch('notify', {
                                    message: 'Failed to update the Product.',
                                    type: 'error',
                                    duration: 4000,
                                });
                            }
                        },

                        async deleteProduct(id) {
                            if (!confirm('Once Product is deleted cannot be recovered!')) {
                                return;
                            }

                            try {
                                const response = await axios.delete(
                                    `{{ route('admin.products.destroy', ':id') }}`
                                    .replace(':id', id));

                                if (response.status === 200) {
                                    this.getProducts();
                                    this.$dispatch('notify', {
                                        message: 'Product deleted successfully!',
                                        type: 'success',
                                        duration: 4000,
                                    });


                                }

                            } catch (error) {
                                this.$dispatch('notify', {
                                    message: 'Failed to delete the Product.',
                                    type: 'error',
                                    duration: 4000,
                                });

                            }
                        },

                        prevPage() {
                            if (this.currentPage > 1) {
                                this.currentPage--;
                                this.getProducts();
                            }
                        },

                        nextPage() {
                            if (this.currentPage < this.totalPages) {
                                this.currentPage++;
                                this.getProducts();
                            }
                        },

                        goToPage(page) {
                            this.currentPage = page;
                            this.getProducts();
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
                            this.getProducts();

                            this.$watch('q', () => {
                                this.getProducts();
                            });
                        },
                    }

                })
            })
        </script>
    @endpush
</x-app-layout>
