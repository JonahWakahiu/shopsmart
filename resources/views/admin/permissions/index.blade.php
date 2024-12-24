<x-app-layout>

    <div x-data="permissionsManagement" class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h6 class="font-semibold text-2xl text-black dark:text-white mb-4">Permissions</h6>


            <div class="flex items-center justify-between mb-4">
                <x-search-input x-model="q" class="min-w-[300px]" />

                <a href="{{ route('products.create') }}"
                    class="flex items-center whitespace-nowrap gap-2 text-sm bg-blue-500 hover:bg-blue-500/80 px-5 py-1.5 rounded-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus size-5 shrink-0"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    <span>Add Permission</span></a>

            </div>
        </div>

        {{-- permissions list --}}
        <div class="w-full border-y border-slate-300 dark:border-slate-700 m:px-6 lg:px-8 bg-white">

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
                    <thead class="border-b border-slate-300 dark:border-slate-700 text-black dark:text-white">
                        <tr>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">Assigned To</th>
                            <th scope="col" class="p-4">Created Date</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                        <template x-for="permission in permissions" :key="permission.id">
                            <tr>
                                <td class="p-3 capitalize" x-text="permission.name"></td>
                                <td class="p-3">
                                    <div class="flex items-center gap-2">
                                        <template x-for="role in permission.roles" :key="role.id">
                                            <span class="py-0.5 px-4 rounded capitalize"
                                                :class="{
                                                    'bg-indigo-100 text-indigo-700': role
                                                        .name === 'admin',
                                                    'bg-green-100 text-green-700': role
                                                        .name === 'customer',
                                                    'bg-amber-100 text-amber-700': role
                                                        .name === 'moderator',
                                                }"
                                                x-text="role.name"></span>
                                        </template>
                                    </div>
                                </td>
                                <td class="p-3"
                                    x-text="new Date(permission.created_at).toLocaleString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                })">
                                </td>

                                <td>
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                </td>
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

                    <x-select-input id="rowsPerPage" x-model="rowsPerPage" @change="getPermissions">
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

        @push('scripts')
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('permissionsManagement', function() {
                        return {
                            permissions: {},

                            rowsPerPage: 10,
                            from: 1,
                            to: 10,
                            total: 0,
                            currentPage: 1,
                            totalPages: 1,

                            // filter
                            q: '',


                            async getPermissions() {
                                try {
                                    const response = await axios.get('{{ route('permissions.list') }}', {
                                        params: {
                                            rowsPerPage: this.rowsPerPage,
                                            page: this.currentPage,

                                            q: this.q,
                                        }
                                    });

                                    if (response.status === 200) {
                                        this.permissions = response.data.data;

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
                                    this.getPermissions();
                                }
                            },

                            nextPage() {
                                if (this.currentPage < this.totalPages) {
                                    this.currentPage++;
                                    this.getPermissions();
                                }
                            },

                            goToPage(page) {
                                this.currentPage = page;
                                this.getPermissions();
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
                                this.getPermissions();
                                this.$watch('q', () => {
                                    this.getPermissions();
                                });
                            }
                        }
                    })
                })
            </script>
        @endpush
</x-app-layout>
