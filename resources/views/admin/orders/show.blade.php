<x-app-layout>
    <div class="py-12" x-data="viewOrder">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center">

                <div>
                    <div class="flex items-center gap-3">
                        <p class="text-xl font-semibold">Order <span x-text="order.order_number"></span></p>

                        <div class="relative">
                            <div class="peer cursor-pointer flex items-center py-1 px-3 rounded-md font-semibold gap-1 max-w-fit capitalize text-sm"
                                :class="{
                                    'bg-green-100 text-green-700': order.payment.status ==
                                        'completed',
                                    'bg-red-100 text-red-700': order.payment.status == 'failed',
                                    'bg-yellow-100 text-yellow-700': order.payment.status == 'pending',
                                    'bg-sky-100 text-sky-700': order.payment.status == 'refunded',
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
                                        class="bi bi-exclamation-circle size-4" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                    </svg>
                                </template>

                                <template x-if="order.payment.status == 'pending'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-clock size-4" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>
                                </template>

                                <template x-if="order.payment.status == 'refunded'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-arrow-clockwise size-4" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                        <path
                                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                    </svg>
                                </template>
                            </div>

                            <div
                                class="absolute -top-9 left-1/2 -translate-x-1/2 z-10 whitespace-nowrap rounded bg-slate-900 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-black">
                                Payment Status</div>
                        </div>

                        <div class="relative">
                            <div class="peer cursor-pointer flex items-center py-1 px-3 rounded-md font-semibold gap-1 max-w-fit capitalize text-sm"
                                :class="{
                                    'bg-orange-100 text-orange-500': order.latest_status.status ==
                                        'pending',
                                    'bg-sky-100 text-sky-500': order.latest_status.status ==
                                        'approved',
                                    'bg-blue-100 text-blue-500': order.latest_status.status == 'processing',
                                    'bg-fuchsia-100 text-fuchsia-500': order.latest_status.status == 'shipped',
                                    'bg-green-100 text-green-500': order.latest_status.status == 'delivered',
                                    'bg-lime-100 text-lime-500': order.latest_status.status == 'completed',
                                    'bg-red-100 text-red-700': order.latest_status.status == 'cancelled',
                                
                                }">
                                <span x-text="order.latest_status.status"></span>

                                <template x-if="order.latest_status.status == 'pending'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-hourglass-bottom size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5m2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2z" />
                                    </svg>
                                </template>

                                <template x-if="order.latest_status.status == 'approved'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check-circle-fill size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </template>

                                <template x-if="order.latest_status.status == 'processing'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-gear-wide-connected size-5 " viewBox="0 0 16 16">
                                        <path
                                            d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
                                    </svg>
                                </template>

                                <template x-if="order.latest_status.status == 'shipped'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-truck size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                    </svg>
                                </template>

                                <template x-if="order.latest_status.status == 'delivered'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-box-seam-fill size-5 " viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                                    </svg>
                                </template>

                                <template x-if="order.latest_status.status == 'completed'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-check2-circle size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                        <path
                                            d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                    </svg>
                                </template>

                                <template x-if="order.latest_status.status == 'cancelled'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-trash-fill size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                    </svg>
                                </template>
                            </div>

                            <div
                                class="absolute -top-9 left-1/2 -translate-x-1/2 z-10 whitespace-nowrap rounded bg-slate-900 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100 dark:bg-white dark:text-black">
                                Fulfillment Status</div>
                        </div>

                    </div>
                    <p
                        x-text="new Date(order.created_at).toLocaleString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                    })">
                    </p>
                </div>

                <div class="ms-auto flex items-center gap-2">
                    <button @click="cancelOrder"
                        class="text-orange-500 border border-orange-500 px-5 py-1.5 rounded-md text-sm">Cancel
                        Order</button>

                    <button @click="deleteOrder"
                        class="bg-red-500 text-white px-5 py-1.5 hover:bg-red-500/80 rounded-md text-sm">Delete
                        Order</button>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-6 gap-7 mt-5">
                <div class="md:col-span-4 space-y-7">
                    <div class=" bg-white dark:bg-slate-800 rounded-md p-5">
                        <p class="text-xl font-semibold">Order Details</p>

                        <div class="overflow-x-auto mt-5">
                            <table
                                class="w-full text-left text-sm border-y border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300">
                                <thead
                                    class="border-b border-slate-300 dark:border-slate-700 text-black dark:text-white">
                                    <tr>
                                        <th scope="col" class="p-3">Products</th>
                                        <th scope="col" class="p-3">Price</th>
                                        <th scope="col" class="p-3">Discount</th>
                                        <th scope="col" class="p-3">QTY</th>
                                        <th scope="col" class="p-3">Total Discount</th>
                                        <th scope="col" class="p-3">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                                    <template x-for="(product, id) in orderProducts" :key="id">
                                        <tr>
                                            <td class="p-3 min-w-[250px]">
                                                <a :href="`{{ route('products.show', ':id') }}`.replace(':id', product.id)"
                                                    class="flex items-center gap-2.5 min-w-fit">
                                                    <img :src="product.oldest_image.url" alt="product.name"
                                                        class="w-14 h-16 rounded-md object-center object-cover shrink-0">

                                                    <div class="">
                                                        <p class="whitespace-normal text-blue-500 hover:text-blue-600 hover:underline underline-offset-1"
                                                            x-text="product.name"></p>
                                                        <div class="mt-2 text-sm">
                                                            <span x-cloak x-show="product.variation_type"
                                                                x-text="product.variation_type + ':'"></span>
                                                            <span class="ms-2" x-cloak
                                                                x-show="product.variation_value"
                                                                x-text="product.variation_value"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="p-3" x-text="'$'+product.pivot.price"></td>
                                            <td class="p-3" x-text="'$'+product.pivot.discount ?? 0"></td>
                                            <td class="p-3" x-text="product.pivot.quantity"></td>
                                            <td class="p-3" x-text="product.pivot.items_discount"></td>
                                            <td class="p-3" x-text="'$'+product.pivot.items_total"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>

                        <div class="flex items-center justify-between py-3  text-lg font-medium">
                            <p>Items subtotal</p>
                            <p x-text="'$'+order.sub_total"></p>
                        </div>
                    </div>

                    <div class=" bg-white dark:bg-slate-800 rounded-md p-5 space-y-4">
                        <div class="flex items-center justify-between">
                            <p class="text-xl font-semibold">Track Order</p>

                            <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                                <button @click="open = ! open">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
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
                                        class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-slate-800">
                                        <p class="px-3 text-black dark:text-white mb-1 font-semibold">Statuses</p>
                                        {{--  --}}
                                        <template x-for="(status, index) in orderStatuses">
                                            <x-input-label ::for="status"
                                                class="flex items-center justify-between px-4 py-1.5 hover:bg-slate-100 dark:hover:bg-slate-600 cursor-pointer">
                                                <span class="capitalize" x-text="status"></span>

                                                <x-checkbox-input ::id="status" ::value="status"
                                                    x-bind:checked="currentStatuses.includes(status)"
                                                    @change="updateStatus(status, index)"
                                                    x-bind:disabled="index > 0 && !currentStatuses.includes(orderStatuses[index - 1])" />
                                            </x-input-label>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-14 pb-10">
                            <template x-for="(status, index) in orderStatuses" :key="status">
                                <div class="text-sm">
                                    <div class="flex items-center gap-2 relative">
                                        <template x-if="status == 'pending'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-hourglass-bottom size-5 text-yellow-500"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5m2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2z" />
                                            </svg>
                                        </template>

                                        <template x-if="status == 'approved'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-check-circle-fill size-5 text-blue-300"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                        </template>

                                        <template x-if="status == 'processing'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-gear-wide-connected size-5 text-blue-500"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
                                            </svg>
                                        </template>

                                        <template x-if="status == 'shipped'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-truck size-5" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                            </svg>
                                        </template>

                                        <template x-if="status == 'delivered'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-box-seam-fill size-5 text-green-500" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                                            </svg>
                                        </template>

                                        <template x-if="status == 'completed'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-check2-circle size-5 text-green-500" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                                <path
                                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                            </svg>
                                        </template>

                                        <template x-if="status == 'cancelled'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-trash-fill size-5 text-red-500" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                            </svg>
                                        </template>

                                        <template x-if="index + 1 != 1">
                                            <div class="absolute bottom-8 left-[10px] h-10 w-0.5 "
                                                :class="order.statuses.some(item => item.status == status) ?
                                                    'bg-blue-700 dark:bg-blue-600' :
                                                    'bg-slate-300 dark:bg-slate-700'">
                                            </div>
                                        </template>

                                        <span class="capitalize"
                                            :class="{
                                                ' text-blue-700 dark:text-blue-600': order.statuses.some(item => item
                                                    .status == status)
                                            }"
                                            x-text="status"></span>

                                        <template x-if="order.statuses.find(item => item.status === status)">
                                            <span class="ms-auto"
                                                x-text="new Date(order.statuses.find(item => item.status === status).created_at).toLocaleString('en-US', {
                                                month: 'short',
                                                day: 'numeric',
                                                year: 'numeric',
                                                hour: '2-digit',
                                                minute: '2-digit',
                                                hour12: true
                                                })"></span>
                                        </template>

                                        <template x-if="order.statuses.find(item => item.status === status)">
                                            <div class="absolute top-full mt-2 left-7 whitespace-nowrap">
                                                <span>Changed By:</span>
                                                <span
                                                    x-text="order.statuses.find(item => item.status === status)?.changed_by?.name"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 space-y-7">
                    <div class=" bg-white dark:bg-slate-800 rounded-md p-5">
                        <p class="text-xl font-semibold">Summary</p>

                        <div class="space-y-3 mt-3">
                            <div class="flex items-center justify-between">
                                <span>Items subtotal:</span>
                                <span x-text="'$'+order.sub_total"></span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Discount:</span>
                                <span class="text-red-500" x-text="'$'+ -order.total_discount"></span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Tax:</span>
                                <span>$0</span>
                            </div>

                            <div class="border-b border-dashed border-slate-300 dark:border-slate-700"></div>

                            <div class="flex items-center justify-between text-ld font-medium">
                                <span>Total</span>
                                <span x-text="'$'+ Number(order.total).toFixed(2)"></span>
                            </div>

                        </div>
                    </div>

                    <div class=" bg-white dark:bg-slate-800 rounded-md p-5 space-y-4">
                        <p class="text-xl font-semibold">Customer details</p>

                        <div class="flex w-max items-center gap-2">
                            <img class="size-10 rounded-full object-cover" :src="order.user.avatar"
                                :alt="order.user.name" />
                            <div class="flex flex-col">
                                <span class="text-black dark:text-white" x-text="order.user.name"></span>
                                <span class="text-sm text-slate-700 opacity-85 dark:text-slate-300"
                                    x-text="order.user.email"></span>
                            </div>
                        </div>

                        <div class="flex w-max items-center gap-3">
                            <div
                                class="size-8 rounded-full flex items-center justify-center bg-green-200 text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </div>

                            <div>
                                <span x-text="order.user.orders_count"></span>
                                Orders
                            </div>
                        </div>

                        <div class="">
                            <p class="text-black dark:text-white font-medium">Contact Info</p>
                            <div>
                                Email: <span x-text="order.user.email"></span>
                            </div>
                            <div>
                                Mobile: <span x-text="order.user.phone_number"></span>
                            </div>
                        </div>
                    </div>

                    <div class=" bg-white dark:bg-slate-800 rounded-md p-5 space-y-4">
                        <p class="text-xl font-semibold">Order Status</p>

                        <div>
                            <x-input-label for="payment_status" :value="_('Payment Status')" />
                            <x-select-input name="payment_status" id="payment_status" class="w-full capitalize">
                                <template x-for="payment_status in ['pending', 'completed', 'failed', 'refunded']"
                                    :key="payment_status">
                                    <option :selected="payment_status == order.payment.status" value="payment_status"
                                        x-text="payment_status"></option>
                                </template>
                            </x-select-input>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('viewOrder', () => ({
                    order: {},
                    orderProducts: {},
                    paymentStatus: '',
                    orderStatuses: [
                        'pending', 'approved', 'processing', 'shipped', 'delivered',
                        'completed', 'cancelled'
                    ],
                    currentStatuses: @json($order->statuses->pluck('status')),

                    async updateStatus(status, index) {
                        if (index > 0 && !this.currentStatuses.includes(this.orderStatuses[index -
                                1])) {
                            alert('Previous statuses must be selected first.');
                            return;
                        }
                        try {
                            if (this.currentStatuses.includes(status)) {
                                // Remove status and all subsequent statuses
                                this.currentStatuses = this.currentStatuses.filter(
                                    (s) => this.orderStatuses.indexOf(s) < index
                                );
                            } else {
                                // Add the status
                                this.currentStatuses.push(status);
                            }

                            const url = `{{ route('admin.orders.update.status', '__orderId__') }}`
                                .replace(
                                    '__orderId__', this.order.id);

                            const response = await axios.put(url, {
                                statuses: this.currentStatuses,
                            });

                            if (response.status === 200) {
                                this.$dispatch('notify', {
                                    message: response.data.message,
                                    type: 'success',
                                    duration: 4000,
                                });
                                this.order.statuses = response.data.order.statuses;
                                this.order.latest_status = response.data.order.latest_status;
                            }

                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async updatePaymentStatus() {
                        if (!confirm('Are you sure?')) {
                            return;
                        }

                        try {
                            const url = `{{ route('admin.orders.update.payment', '__orderId__') }}`
                                .replace(
                                    '__orderId__', this.order.id);

                            const response = await axios.delete(url, {
                                payment_status: this.paymentStatus,
                            });

                            if (response.status == 200) {
                                this.$dispatch('notify', {
                                    message: response.data.message,
                                    type: 'success',
                                    duration: 4000,
                                });

                                this.order.payment = response.data.order.payment;
                            }


                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async deleteOrder() {
                        if (!confirm('Once Order is deleted cannot be recovered!')) {
                            return;
                        }

                        try {
                            const url = `{{ route('admin.orders.destroy', '__orderId__') }}`.replace(
                                '__orderId__', this.order.id);

                            const response = await axios.delete(url);

                            if (response.status == 200) {
                                this.$dispatch('notify', {
                                    message: response.data.message,
                                    type: 'success',
                                    duration: 4000,
                                });

                                window.location.assign("{{ route('admin.orders.index') }}");
                            }


                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async cancelOrder() {
                        if (!confirm('Are you sure?')) {
                            return;
                        }

                        try {
                            const url = `{{ route('admin.orders.cancel', '__orderId__') }}`.replace(
                                '__orderId__', this.order.id);

                            const response = await axios.put(url);

                            if (response.status == 200) {
                                this.$dispatch('notify', {
                                    message: response.data.message,
                                    type: 'success',
                                    duration: 4000,
                                });

                                this.order.statuses = response.data.order.statuses;
                                this.order.latest_status = response.data.order.latest_status;
                            }


                        } catch (error) {
                            console.log(error);
                        }
                    },

                    init() {
                        this.order = @json($order);
                        this.orderProducts = @json($orderProducts);
                        console.log(this.order);

                    },
                }))
            })
        </script>
    @endpush
</x-app-layout>
