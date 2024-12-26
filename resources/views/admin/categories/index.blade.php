<x-app-layout>
    <div class="py-12" x-data="categoriesManagement">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h6 class="font-semibold text-2xl text-black dark:text-white mb-4">Categories</h6>

            <div class="flex items-center justify-between mb-4">

                <x-search-input x-model="q" class="min-w-[300px]" />

                <div>
                    <button @click="modalIsOpen = true"
                        class="flex items-center gap-2 text-sm bg-blue-500 hover:bg-blue-500/80 px-5 py-1.5 rounded-md text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus size-5 shrink-0"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <span>Add Category</span></button>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="w-full border-y border-slate-300 dark:border-slate-700 m:px-6 lg:px-8 bg-white">

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
                    <thead class="border-b border-slate-300 dark:border-slate-700 text-black dark:text-white">
                        <tr>
                            <th scope="col" class="p-3">Categories</th>
                            <th scope="col" class="p-3">Total Products</th>
                            <th scope="col" class="p-3">Total Earning</th>
                            <th scope="col" class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                        <template x-for="category in categories" :key="category.id">
                            <tr>
                                <td class="px-3 py-2" x-text="category.name"></td>
                                <td class="px-3 py-2" x-text="category.products_count"></td>
                                <td class="px-3 py-2 font-medium" x-text="category.total_earnings"></td>
                                <td class="px-3 py-2">
                                    <div class="flex items-center flex-shrink-0 gap-2">
                                        <button type="button" @click="modalIsOpen = true, selectedCategory = category"
                                            class="flex text-blue-700 items-center justify-center p-1.5 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>

                                        <button type="button" @click="deleteCategory(category.id)"
                                            class="flex items-center justify-center p-1.5 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-trash size-5 text-red-700" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>

                        <template x-if="isLoading">
                            <tr>
                                <td colspan="10" class="p-4 text-sm font-medium">Loading...</td>
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

                    <x-select-input id="rowsPerPage" x-model="rowsPerPage" @change="getCategories">
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

        {{-- show modal --}}
        <div x-cloak x-show="modalIsOpen" x-transtion.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
            @click.self="closeModal"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blue-md sm:items-center lg:p-8">

            <!-- modal dialog -->
            <div x-show="modalIsOpen"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                class="w-full p-7 max-w-lg rounded-xl border border-slate-300 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 relative">

                <button
                    class="absolute right-0 top-0 -translate-y-1/2 bg-slate-100 dark:bg-slate-800 shadow-md translate-x-1/2 p-1.5 rounded-md"
                    @click="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                        stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="text-center">
                    <h6 class="font-semibold text-xl text-slate-900 dark:text-slate-100 mb-2"
                        x-show="Object.keys(selectedCategory).length > 0" x-cloak>
                        Edit Category
                    </h6>

                    <h6 class="font-semibold text-xl text-slate-900 dark:text-slate-100 mb-2"
                        x-show="Object.keys(selectedCategory).length === 0" x-cloak>
                        Add Category
                    </h6>
                </div>

                <form class="space-y-3 mt-5" @submit.prevent="handleFormSubmit($event)">
                    <div>
                        <x-input-label for="name" :value="_('Category Name')" />
                        <x-text-input id="name" name="name" class="w-full" ::value="selectedCategory ? selectedCategory.name : ''" />
                    </div>

                    <div>
                        <x-input-label for="slug" :value="_('Category Slug')" />

                        <x-textarea-input name="slug" id="slug" class="min-h-24" ::value="selectedCategory ? selectedCategory.slug : ''" />
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="submit" x-cloak x-show="Object.keys(selectedCategory).length === 0"
                            class="py-2 px-5 rounded-md font-medium bg-blue-500 hover:bg-blue-500/80 text-white text-sm">Add</button>

                        <button type="submit" x-cloak x-show="Object.keys(selectedCategory).length > 0" x-cloak
                            class="py-2 px-5 rounded-md font-medium bg-blue-500 hover:bg-blue-500/80 text-white text-sm">Update</button>

                        <button type="reset"
                            class="py-2 px-5 rounded-md font-medium bg-red-500 hover:bg-red-500/80 text-white text-sm">Discard</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('categoriesManagement', function() {
                    return {
                        categories: {},
                        isLoading: false,
                        q: '',
                        modalIsOpen: false,

                        // pagination
                        rowsPerPage: 10,
                        from: 1,
                        to: 10,
                        total: 0,
                        currentPage: 1,
                        totalPages: 1,
                        successMessage: '',

                        selectedCategory: [],

                        closeModal() {
                            this.modalIsOpen = false;
                            this.selectedCategory = [];
                        },

                        async getCategories() {
                            try {
                                const response = await axios.get('{{ route('admin.categories.list') }}', {
                                    params: {
                                        q: this.q,

                                        rowsPerPage: this.rowsPerPage,
                                        page: this.currentPage,
                                    }
                                });

                                if (response.status === 200) {
                                    this.categories = response.data.data;
                                    this.isLoading = false;

                                    this.from = response.data.from;
                                    this.to = response.data.to;
                                    this.total = response.data.total;
                                    this.currentPage = response.data.current_page;
                                    this.totalPages = response.data.last_page;

                                }
                            } catch (error) {
                                console.log(error)
                            }
                        },

                        async handleFormSubmit(event) {
                            const formData = new FormData(event.target);

                            if (Object.keys(this.selectedCategory).length === 0) {
                                try {
                                    const response = await axios.post(
                                        '{{ route('admin.categories.store') }}', {
                                            name: formData.get('name'),
                                            slug: formData.get('slug'),
                                        });

                                    if (response.status === 200) {
                                        this.getCategories();
                                        this.closeModal();
                                        this.$dispatch('notify', {
                                            message: response.data.message,
                                            type: 'success',
                                            duration: 4000,
                                        });

                                    }

                                } catch (error) {
                                    console.log(error);
                                }
                            }

                            if (Object.keys(this.selectedCategory).length > 0) {
                                try {
                                    const response = await axios.put(
                                        `{{ route('admin.categories.update', ':id') }}`
                                        .replace(':id', this.selectedCategory.id), {
                                            name: formData.get('name'),
                                            slug: formData.get('slug'),
                                        });

                                    if (response.status === 200) {
                                        this.getCategories();
                                        this.closeModal();
                                        this.$dispatch('notify', {
                                            message: response.data.message,
                                            type: 'success',
                                            duration: 4000,
                                        });

                                    }

                                } catch (error) {
                                    console.log(error);
                                }
                            }

                            return;
                        },

                        async deleteCategory(id) {
                            if (!confirm('Once Category is deleted cannot be recovered!')) {
                                return;
                            }
                            try {
                                const response = await axios.delete(
                                    `{{ route('admin.categories.destroy', ':id') }}`.replace(':id', id));

                                if (response.status === 200) {
                                    this.getCategories();
                                    this.$dispatch('notify', {
                                        message: response.data.message,
                                        type: 'success',
                                        duration: 4000,
                                    });

                                    setTimeout(() => {
                                        this.successMessage = '';
                                    }, 5000);
                                }
                            } catch (error) {
                                console.log(error);

                            }
                        },

                        prevPage() {
                            if (this.currentPage > 1) {
                                this.currentPage--;
                                this.getCategories();
                            }
                        },

                        nextPage() {
                            if (this.currentPage < this.totalPages) {
                                this.currentPage++;
                                this.getCategories();
                            }
                        },

                        goToPage(page) {
                            this.currentPage = page;
                            this.getCategories();
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
                            this.getCategories();

                            this.$watch('q', () => {
                                this.getCategories();
                            });
                        }
                    }
                })
            })
        </script>
    @endpush
</x-app-layout>
