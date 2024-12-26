<x-app-layout>

    <div class="py-12" x-data="customerManagement">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h6 class="font-semibold text-2xl text-black dark:text-white mb-4">Customer Details</h6>

            <div class="grid grid-cols-3 gap-7">
                <div class="col-span-1">
                    <div class="bg-white rounded-md p-5">
                        <div class="flex flex-col items-center gap-1.5">
                            <img :src="customer.avatar" :alt="customer.name" class="size-32 rounded-full">
                            <p class="text-xl font-semibold text-slate-700" x-text="customer.name"></p>
                            <p class="text-slate-600" x-text="customer.email"></p>
                        </div>
                        <div class="grid grid-cols-2 mt-5">
                            <div class="flex items-center gap-3">
                                <div class="size-11 rounded-md bg-slate-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-lg"
                                        x-text="customer.orders_count ? customer.orders_count : 0.00"></p>
                                    <p class="text-slate-700 font-medium">Orders</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="size-11 rounded-md bg-slate-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="font-semibold text-lg"
                                        x-text="customer.total_spent ? customer.total_spent : 0.00"></p>
                                    <p class="text-slate-700 font-medium">Spent</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 space-y-2">
                            <p class="font-semibold text-slate-700">Details</p>
                            <div class="border-b border-dashed border-slate-300"></div>

                            <p class="font-semibold text-slate-700">Username: <span class="text-slate-600 font-medium"
                                    x-text="customer.name"></span></p>
                            <p class="font-semibold text-slate-700">Email: <span class="text-slate-600 font-medium"
                                    x-text="customer.email"></span></p>
                            <p class="font-semibold text-slate-700">Status: <span class="text-slate-600 font-medium"
                                    x-text="customer.status"></span></p>
                            <p class="font-semibold text-slate-700">Contact: <span class="text-slate-600 font-medium"
                                    x-text="customer.phone_number"></span></p>
                            <p class="font-semibold text-slate-700">City: <span class="text-slate-600 font-medium"
                                    x-text="customer.city"></span></p>

                        </div>
                    </div>
                </div>


                <div class="col-span-2">
                    <div class="bg-white p-5 rounded-md">
                        <div class="flex items-center justify-between mb-4">

                            <h6 class="font-semibold text-2xl text-black dark:text-white">Orders</h6>

                            <x-search-input x-model="q" class="max-w-[300px]" />
                        </div>


                        <div class="w-full border-y border-slate-300 dark:border-slate-700">

                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
                                    <thead
                                        class="border-b border-slate-300 dark:border-slate-700 text-black dark:text-white">
                                        <tr>
                                            <th scope="col" class="p-3">Order</th>
                                            <th scope="col" class="p-3">Total</th>
                                            <th scope="col" class="p-3">Payment Status</th>
                                            <th scope="col" class="p-3">Fulfilment Status</th>
                                            <th scope="col" class="p-3">Date</th>

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                                        <template x-for="order in customerOrders" :key="order.id">
                                            <tr>
                                                <td class="p-3">
                                                    <a :href="`{{ route('admin.orders.show', ':id') }}`.replace(':id', order.id)"
                                                        class="whitespace-normal text-blue-500 hover:text-blue-600 hover:underline underline-offset-1"
                                                        x-text="order.order_number"></a>
                                                </td>
                                                <td class="p-3 font-medium  dark:text-white"
                                                    x-text="'$ ' +order.total_price">
                                                </td>

                                                <td class="p-3">
                                                    <div class="flex items-center py-1 px-3 rounded-md font-semibold gap-1 max-w-fit capitalize text-xs"
                                                        :class="{
                                                            'bg-green-100 text-green-700': order.payment.status ==
                                                                'completed',
                                                            'bg-red-100 text-red-700': order.payment.status == 'failed',
                                                            'bg-yellow-100 text-yellow-700': order.payment.status ==
                                                                'pending',
                                                            'bg-sky-100 text-sky-700': order.payment.status ==
                                                                'refunded',
                                                        }">
                                                        <span x-text="order.payment.status"></span>

                                                        <template x-if="order.payment.status == 'completed'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="bi bi-check2 size-4" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.payment.status == 'failed'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="bi bi-exclamation-circle size-4"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path
                                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.payment.status == 'pending'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="bi bi-clock size-4" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                                                <path
                                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.payment.status == 'refunded'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor"
                                                                class="bi bi-arrow-clockwise size-4"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                                                <path
                                                                    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                                            </svg>
                                                        </template>

                                                    </div>
                                                </td>
                                                <td class="p-3">
                                                    <div class="flex items-center py-1 px-3 rounded-md font-semibold gap-1 max-w-fit capitalize text-xs"
                                                        :class="{
                                                            'bg-orange-100 text-orange-500': order.latest_status
                                                                .status ==
                                                                'pending',
                                                            'bg-sky-100 text-sky-500': order.latest_status.status ==
                                                                'approved',
                                                            'bg-blue-100 text-blue-500': order.latest_status.status ==
                                                                'processing',
                                                            'bg-fuchsia-100 text-fuchsia-500': order.latest_status
                                                                .status == 'shipped',
                                                            'bg-green-100 text-green-500': order.latest_status.status ==
                                                                'delivered',
                                                            'bg-lime-100 text-lime-500': order.latest_status.status ==
                                                                'completed',
                                                            'bg-red-100 text-red-700': order.latest_status.status ==
                                                                'cancelled',
                                                        }">
                                                        <span x-text="order.latest_status.status"></span>

                                                        <template x-if="order.latest_status.status == 'pending'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor"
                                                                class="bi bi-hourglass-bottom size-4"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5m2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2z" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.latest_status.status == 'approved'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor"
                                                                class="bi bi-check-circle-fill size-4"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.latest_status.status == 'processing'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor"
                                                                class="bi bi-gear-wide-connected size-4 "
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.latest_status.status == 'shipped'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" class="bi bi-truck size-4"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.latest_status.status == 'delivered'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor"
                                                                class="bi bi-box-seam-fill size-4 "
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.latest_status.status == 'completed'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" class="bi bi-check2-circle size-4"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                                                <path
                                                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                            </svg>
                                                        </template>

                                                        <template x-if="order.latest_status.status == 'cancelled'">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" class="bi bi-trash-fill size-4"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                            </svg>
                                                        </template>
                                                    </div>
                                                </td>
                                                <td class="p-3"
                                                    x-text="new Date(order.created_at).toLocaleString('en-US', {
                                                month: 'short',
                                                day: 'numeric',
                                                year: 'numeric',
                                                hour: '2-digit',
                                                minute: '2-digit',
                                                hour12: true
                                                })">
                                                </td>
                                            </tr>
                                        </template>
                                        <template x-if="isLoading">
                                            <tr>
                                                <td class="p-3 text-center" colspan="10">Loading...</td>
                                            </tr>
                                        </template>
                                        <template x-if="!isLoading && customerOrders.length < 1">
                                            <tr>
                                                <td class="p-3 text-center" colspan="10">No orders available</td>
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

                                    <x-select-input id="rowsPerPage" x-model="rowsPerPage"
                                        @change="getCustomerOrders">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-5">
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true"
                                                            stroke="currentColor" class="w-6 h-6">
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true"
                                                            stroke="currentColor" class="w-6 h-6">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-5">
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
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('customerManagement', () => ({
                    customer: {},
                    customerOrders: {},
                    isLoading: true,

                    // pagination
                    rowsPerPage: 10,
                    from: 1,
                    to: 10,
                    total: 0,
                    currentPage: 1,
                    totalPages: 1,

                    // search user order
                    q: '',

                    async getCustomerOrders() {
                        try {
                            const url = `{{ route('admin.customer.orders', '__customerId__') }}`
                                .replace(
                                    '__customerId__', this.customer.id);

                            const response = await axios.get(url, {
                                params: {
                                    rowsPerPage: this.rowsPerPage,
                                    page: this.currentPage,

                                    q: this.q,
                                }
                            });

                            if (response.status === 200) {
                                this.isLoading = false;
                                this.customerOrders = response.data.data;

                                this.from = response.data.from;
                                this.to = response.data.to;
                                this.total = response.data.total;
                                this.currentPage = response.data.current_page;
                                this.totalPages = response.data.last_page;

                                console.log(response);
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    prevPage() {
                        if (this.currentPage > 1) {
                            this.currentPage--;
                            this.getCustomerOrders();
                        }
                    },

                    nextPage() {
                        if (this.currentPage < this.totalPages) {
                            this.currentPage++;
                            this.getCustomerOrders();
                        }
                    },

                    goToPage(page) {
                        this.currentPage = page;
                        this.getCustomerOrders();
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
                        this.customer = @json($customer);
                        this.getCustomerOrders();
                        console.log(this.customerOrders);

                        this.$watch('q', () => {
                            this.getCustomerOrders();
                        });

                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
