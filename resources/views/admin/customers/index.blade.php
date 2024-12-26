<x-app-layout>
    <div class="py-12" x-data="customerManagement">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h6 class="font-semibold text-2xl text-black dark:text-white mb-4">Customers</h6>

            <div class="flex items-center justify-between mb-4">

                <x-search-input x-model="q" class=" min-w-[300px]" />


            </div>
        </div>

        {{-- table --}}
        <div class="w-full border-y border-slate-300 dark:border-slate-700 m:px-6 lg:px-8 bg-white">

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
                    <thead class="border-b border-slate-300 dark:border-slate-700 text-black dark:text-white">
                        <tr>
                            <th scope="col" class="p-4">Customer</th>
                            <th scope="col" class="p-4">Email</th>
                            <th scope="col" class="p-4">Orders</th>
                            <th scope="col" class="p-4">Total Spent</th>
                            <th scope="col" class="p-4">City</th>
                            <th scope="col" class="p-4">Last Order</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                        <template x-for="customer in customers" :key="customer.id">
                            <tr>
                                <td class="p-3">
                                    <div class="flex flex-shrink-0 items-center gap-2">
                                        <img :src="customer.avatar" :alt="customer.name"
                                            class="size-8 object-cever object-center rounded-full">
                                        <span x-text="customer.name"></span>
                                    </div>
                                </td>
                                <td class="p-3" x-text="customer.email"></td>
                                <td class="p-3" x-text="customer.orders_count"></td>
                                <td class="p-3">
                                    <template x-if="customer.total_spent">
                                        <span x-text="'$'+customer.total_spent"></span>
                                    </template>

                                    <template x-if="!customer.total_spent">
                                        <span>0.00</span>
                                    </template>
                                </td>
                                <td class="p-3">
                                    <template x-if="customer.city"><span x-text="customer.city"></span></template>
                                    <template x-if="!customer.city"><span class="italic">null</span></template>
                                </td>
                                <td class="p-3">
                                    <template x-if="customer.latest_order">
                                        <span
                                            x-text="new Date(customer.latest_order?.created_at).toLocaleString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                    })"></span>
                                    </template>

                                    <template x-if="!customer.latest_order">
                                        <span class="italic">null</span>
                                    </template>
                                </td>
                                <td class="p-3">
                                    <div class="flex items-center gap-3">
                                        <a
                                            :href="`{{ route('admin.customers.show', '__id__') }}`.replace('__id__', customer
                                                .id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                            </svg>
                                        </a>

                                        <button class="text-red-500" @click="deleteCustomer(customer.id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
                                <td class="p-3 text-center" colspan="10">Loading...</td>
                            </tr>
                        </template>

                        <template x-if="!isLoading && customers.length < 1">
                            <tr>
                                <td class="p-3 text-center" colspan="10">No customers available</td>
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

                    <x-select-input id="rowsPerPage" x-model="rowsPerPage" @change="getCustomers">
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

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('customerManagement', function() {
                    return {
                        customers: {},
                        isLoading: false,

                        // pagination
                        rowsPerPage: 10,
                        from: 1,
                        to: 10,
                        total: 0,
                        currentPage: 1,
                        totalPages: 1,

                        // filter
                        q: '',

                        async getCustomers() {
                            try {
                                this.isLoading = true;
                                const response = await axios.get('{{ route('admin.customers.list') }}', {
                                    params: {
                                        rowsPerPage: this.rowsPerPage,
                                        page: this.currentPage,

                                        q: this.q,
                                    }
                                });

                                if (response.status === 200) {
                                    this.isLoading = false;
                                    this.customers = response.data.data;

                                    this.from = response.data.from;
                                    this.to = response.data.to;
                                    this.total = response.data.total;
                                    this.currentPage = response.data.current_page;
                                    this.totalPages = response.data.last_page;

                                }
                            } catch (error) {
                                this.isLoading = false;
                                console.log(error);

                            }
                        },

                        prevPage() {
                            if (this.currentPage > 1) {
                                this.currentPage--;
                                this.getCustomers();
                            }
                        },

                        nextPage() {
                            if (this.currentPage < this.totalPages) {
                                this.currentPage++;
                                this.getCustomers();
                            }
                        },

                        goToPage(page) {
                            this.currentPage = page;
                            this.getCustomers();
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

                        async deleteCustomer(customerId) {
                            try {
                                const url = `{{ route('admin.customers.destroy', '__customerId__') }}`
                                    .replace(
                                        '__customerId__', customerId);

                                const response = await axios.delete(url);

                                if (response.status === 200) {
                                    this.getCustomers();
                                    this.$dispatch('notify', {
                                        message: response.data.message,
                                        type: 'success',
                                        duration: 4000,
                                    });
                                }

                            } catch (error) {
                                console.log(error);
                            }
                        },


                        init() {
                            this.getCustomers();

                            this.$watch('q', () => {
                                this.getCustomers();
                            });
                        }
                    }
                })
            })
        </script>
    @endpush
</x-app-layout>
