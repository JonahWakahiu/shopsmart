<x-app-layout>


    <div x-data="roleManagement" class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h6 class="font-semibold text-2xl text-black dark:text-white mb-2">Roles</h6>
            <p class="font-normal">A role provided access to predefined menus and features so that depending on
                assigned role an administrator can have access to what user needs.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
                <template x-for="role in roles" :key="role.id">
                    <div class="bg-white rounded-md shadow-md p-5">
                        <div class="flex items-center justify-between">
                            <div>Total <span x-text="role.users_count"></span> users</div>


                            <div class="flex items-center -space-x-3">
                                <template x-for="(user, index) in role.users.slice(0,4)" :key="user.id">
                                    <div>

                                        <template x-if="index < 3 || role.users.length <= 4">
                                            <div :class="`z-${index}`"
                                                class="h-10 w-10 rounded-full relative border-2 border-slate-white dark:border-slate-100 cursor-pointer hover:z-10">
                                                <img :src="user.avatar" :alt="user.name"
                                                    class="rounded-full bg-cover h-full w-full bg-center">
                                            </div>
                                        </template>

                                        <template x-if="index === 3 && role.users.length > 4">
                                            <div :class="`z-${index}`"
                                                class="w-10 relative h-10 rounded-full bg-slate-300 dark:bg-slate-800 dark:text-slate-300 border-2 border-white dark:border-slate-700 text-center text-sm font-bold flex items-center justify-center cursor-pointer">
                                                + <span x-text="role.users.length - 3"></span>
                                            </div>
                                        </template>

                                    </div>
                                </template>
                            </div>
                        </div>

                        <p class="mt-4 capitalize text-black dark:text-white" x-text="role.name"></p>
                        <div class="flex items-center justify-between flex-shrink-0">
                            <button type="button" class="text-blue-700 mt-1"
                                @click="editRoleModal = true, selectedRole = { ...role, permissions: role.permissions.map(p => p.name) }">Edit
                                Role</button>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-copy size-5 "
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                            </svg>

                        </div>
                    </div>
                </template>
            </div>

            <div class="mt-8">
                <h6 class="font-semibold text-2xl text-black dark:text-white">Total users with their roles</h6>
            </div>
        </div>

        {{-- total users with their roles table  --}}
        <div class="p-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-5">
            <x-search-input class="w-full" placeholder="Search user..." x-model="searchUser" />

            <div>
                <x-select-input class="w-full" x-model="filterByRole" @change="getRoles">
                    <option value="" selected>Role</option>
                    <template x-for="role in roles" :key="role.id">
                        <option :value="role.name" x-text="role.name"></option>
                    </template>
                </x-select-input>
            </div>

            <div>
                <x-select-input class="w-full" x-model="filterByStatus" @change="getRoles">
                    <option value="" selected>Status</option>
                    <template x-for="status in ['active', 'inactive']" :key="status">
                        <option :value="status" x-text="status"></option>
                    </template>
                </x-select-input>
            </div>

        </div>
        <div class="w-full border-y border-slate-300 dark:border-slate-700 m:px-6 lg:px-8 bg-white">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
                    <thead class="border-b border-slate-300 dark:border-slate-700 text-black dark:text-white">
                        <tr>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">Role</th>
                            <th scope="col" class="p-4">Status</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                        <template x-for="user in users" :key="user.id">
                            <tr>
                                <td class="p-3">
                                    <div class="flex flex-shrink-0 items-center gap-2">
                                        <img :src="user.avatar" :alt="user.name"
                                            class="size-8 object-cever object-center rounded-full">

                                        <div class="flex flex-col flex-shrink-0 text-[13px]">
                                            <span x-text="user.name"></span>
                                            <span x-text="user.email"></span>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-3">
                                    <div class="flex items-center gap-2">
                                        <template x-for="role in user.roles">
                                            <div class="flex items-center space-x-2">
                                                <template x-if="role.name === 'admin'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="bi bi-display size-5 text-red-600" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4q0 1 .25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75Q6 13 6 12H2s-2 0-2-2zm1.398-.855a.76.76 0 0 0-.254.302A1.5 1.5 0 0 0 1 4.01V10c0 .325.078.502.145.602q.105.156.302.254a1.5 1.5 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.76.76 0 0 0 .254-.302 1.5 1.5 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.76.76 0 0 0-.302-.254A1.5 1.5 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145" />
                                                    </svg>
                                                </template>

                                                <template x-if="role.name === 'customer'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="bi bi-person size-5 text-green-700" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                                    </svg>
                                                </template>

                                                <template x-if="role.name === 'moderator'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="bi bi-person-workspace size-5 text-purple-700"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                        <path
                                                            d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                                                    </svg>
                                                </template>

                                                <span class="capitalize" x-text="role.name"></span>
                                            </div>
                                        </template>
                                    </div>
                                </td>

                                <td class="p-3">
                                    <span class="px-4 py-0.5 rounded capitalize"
                                        :class="{
                                            'text-green-700 bg-green-100': user
                                                .status === 'active',
                                            'text-purple-700 bg-purple-100': user
                                                .status === 'inactive',
                                        }"
                                        x-text="user.status">
                                    </span>
                                </td>

                                <td class="p-3">
                                    <div class="flex items-center space-x-2.5">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                            </svg>
                                        </button>

                                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                                            <button
                                                @click="open = ! open, selectedUser = { ...user, roles: user.roles.map(p => p.name) }">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-three-dots-vertical"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                                </svg>
                                            </button>

                                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                                x-transition:enter-start="opacity-0 scale-95"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-75"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0 scale-95"
                                                class="absolute z-50 mt-2 w-48 rounded-md shadow-lg ltr:origin-top-right rtl:origin-top-left end-0"
                                                style="display: none;">
                                                <div
                                                    class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-700">
                                                    <p class="px-3 text-black mb-1 font-semibold">Roles</p>
                                                    {{--  --}}
                                                    <template x-for="role in ['admin', 'moderator', 'customer']">
                                                        <x-input-label ::for="role"
                                                            class="flex items-center justify-between px-4 py-1.5 hover:bg-slate-100 cursor-pointer">
                                                            <span class="capitalize" x-text="role"></span>

                                                            <x-checkbox-input ::id="role" ::value="role"
                                                                @change="updateUserRoles" x-model="selectedUser.roles"
                                                                ::checked="user.roles.some(item => item.name === role)" />
                                                        </x-input-label>
                                                    </template>

                                                    <p class="px-3 text-black mb-1 mt-1.5 font-semibold">Status</p>

                                                    <template x-for="status in ['active', 'inactive']">
                                                        <x-input-label ::for="status"
                                                            class="flex items-center justify-between px-4 py-1.5 hover:bg-slate-100 cursor-pointer">
                                                            <span class="capitalize" x-text="status"></span>

                                                            <x-radio-input ::id="status" ::value="status"
                                                                @change="updateUserStatus(user.id, $event)"
                                                                x-model="user.status" ::checked="user.status === status"
                                                                ::name="'status-' + user.id" />
                                                        </x-input-label>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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

                    <x-select-input id="rowsPerPage" x-model="rowsPerPage" @change="getRoles">
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

        <div x-cloak x-show="editRoleModal" x-transition.opacity.duration.200ms x-trap.inert.noscroll="editRoleModal"
            @keydown.esc.window="closeEditModal" @click.self="closeEditModal"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8  overflow-y-scroll">

            <!-- Modal Dialog -->
            <div x-show="editRoleModal"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="relative w-full max-w-xl mt-20 space-y-5  rounded-xl border border-slate-300 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 p-10">

                <button
                    class="absolute right-0 top-0 -translate-y-1/2 bg-slate-100 dark:bg-slate-800 shadow-md translate-x-1/2 p-1.5 rounded-md"
                    @click="closeEditModal" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                        stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- header --}}
                <div class="text-center">
                    <p class="text-lg text-black dark:text-white">Edit Role</p>
                    <p>Set role permissions</p>
                </div>

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" x-model="selectedRole.name"
                        class="mt-1 block w-full" readonly />
                </div>

                <h3 class="mb-3 font-semibold text-dark">Role Permissions</h3>

                <form @submit.prevent="updateRolePermissions"
                    class="overflow-hidden overflow-x-auto divide-y divide-slate-300 dark:divide-slate-700">

                    <template x-for="(permissions, category) in allPermissions" :key="category">
                        <div class="grid grid-cols-3 gap-2 w-full min-w-96">
                            <div class="py-4 capitalize col-span-1" x-text="category"></div>

                            <div class="flex items-center gap-5 col-span-2">
                                <template x-for="permission in permissions">
                                    <div class="flex items-center gap-3">
                                        <x-checkbox-input ::id="permission.name" name="permissions[]" ::value="permission.name"
                                            x-model="selectedRole.permissions" />
                                        <x-input-label class="capitalize cursor-pointer" ::for="permission.name"
                                            x-text="permission.name.split(' ')[0]" />
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>


                    <div class="flex items-center justify-center pt-4 space-x-3">
                        <button type="submit"
                            class="bg-blue-500 text-white px-5 py-2 text-sm rounded-md hover:bg-blue-500/90">Submit</button>
                        <button type="reset"
                            class="bg-red-500 text-white px-5 py-2 text-sm rounded-md hover:bg-red-500/90">Clear</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('roleManagement', function() {
                    return {
                        roles: {},
                        users: {},
                        allPermissions: {},
                        selectedUser: {
                            roles: [],
                        },
                        editRoleModal: false,
                        selectedRole: {
                            permissions: [],
                        },

                        searchUser: '',
                        filterByRole: '',
                        filterByStatus: '',

                        // pagination
                        rowsPerPage: 10,
                        from: 1,
                        to: 10,
                        total: 0,
                        currentPage: 1,
                        totalPages: 1,

                        closeEditModal() {
                            this.editRoleModal = false;
                            this.selectedRole = {
                                permissions: [],
                            }
                        },

                        async getRoles() {
                            try {
                                const response = await axios.get('{{ route('roles.list') }}', {
                                    params: {
                                        rowsPerPage: this.rowsPerPage,
                                        page: this.currentPage,

                                        searchUser: this.searchUser,
                                        filterByRole: this.filterByRole,
                                        filterByStatus: this.filterByStatus,
                                    }
                                });

                                if (response.status === 200) {
                                    this.roles = response.data.roles;
                                    this.users = response.data.users.data;
                                    this.allPermissions = response.data.permissions;

                                    this.from = response.data.users.from;
                                    this.to = response.data.users.to;
                                    this.total = response.data.users.total;
                                    this.currentPage = response.data.users.current_page;
                                    this.totalPages = response.data.users.last_page;

                                }
                            } catch (error) {
                                console.log(error);

                            }
                        },

                        async updateUserRoles() {
                            try {
                                const response = await axios.post(`{{ route('user.roles', ':id') }}`
                                    .replace(':id', this.selectedUser.id), {
                                        roles: this.selectedUser.roles,
                                    });

                                if (response.status === 200) {
                                    this.getRoles();

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

                        async updateUserStatus(userId, event) {
                            try {
                                const response = await axios.post(`{{ route('user.status', ':id') }}`
                                    .replace(':id', userId), {
                                        status: event.target.value,
                                    });

                                if (response.status === 200) {
                                    this.getRoles;

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

                        async updateRolePermissions() {
                            try {
                                const response = await axios.put(`{{ route('roles.update', ':id') }}`
                                    .replace(':id', this.selectedRole.id), {
                                        permissions: this.selectedRole.permissions,
                                    });

                                if (response.status === 200) {
                                    this.getRoles();
                                    this.closeEditModal();

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

                        prevPage() {
                            if (this.currentPage > 1) {
                                this.currentPage--;
                                this.getRoles();
                            }
                        },

                        nextPage() {
                            if (this.currentPage < this.totalPages) {
                                this.currentPage++;
                                this.getRoles();
                            }
                        },

                        goToPage(page) {
                            this.currentPage = page;
                            this.getRoles();
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
                            this.getRoles();
                            this.$watch('searchUser', () => {
                                this.getRoles();
                            });
                        }
                    }
                })
            })
        </script>
    @endpush
</x-app-layout>
