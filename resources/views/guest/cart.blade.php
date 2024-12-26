<x-index-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 items-start gap-7">
                <div class="col-span-3 bg-white dark:bg-slate-800 rounded-md">

                    <div class="px-5 py-2 flex items-center">
                        <h6 class="font-semibold text-2xl text-black dark:text-white">Cart</h6>

                        <button @click="$store.cart.clearCart()"
                            class="ms-auto text-sm inline-flex items-center gap-2 bg-red-500 text-white rounded-md py-1.5 px-5"><span>CLEAR</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash size-4"
                                viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            </svg>
                        </button>
                    </div>

                    <div class=" divide-y divide-slate-300 dark:divide-slate-800">
                        <template x-for="product in $store.cart.products" :key="product.product_key">
                            <div class="py-3 px-5">

                                <div class="flex items-start gap-3 ">
                                    <!-- product image -->
                                    <div class="size-14 rounded-md overflow-hidden">
                                        <img :src="product.oldest_image" :alt="product.name"
                                            class="w-full h-full object-cever object-center">
                                    </div>

                                    <div>
                                        <a :href="`{{ route('products.show', '__id__') }}`.replace('__id__', product.id)"
                                            class="capitalize font-semibold group-hover:text-blue-600 dark:hover:text-blue-400  hover:underline underline-offset-1"
                                            x-text="product.name"></a>

                                        <div x-show="product.variation_type && product.variation_value"
                                            class="flex items-center gap-2 text-sm font-medium">
                                            <span x-text="product.variation_type +':'"></span>
                                            <span x-text="product.variation_value"></span>
                                        </div>

                                        <div>
                                            <template x-if="product.stock_quantity > 0">
                                                <span class="text-green-500 text-xs font-semibold">In Stock</span>
                                            </template>
                                            <template x-if="product.stock_quantity == 0">
                                                <span class="text-red-500 text-xs font-semibold">Out Of Stock</span>
                                            </template>
                                        </div>

                                    </div>

                                    <div class="ms-auto">

                                        <p x-text="'$' +( product.price - product.discount).toFixed(2)"
                                            class="font-semibold">
                                        </p>


                                        <template x-if="product.discount">
                                            <div class="flex items-center gap-2">
                                                <p x-text="'$'+ product.price"
                                                    class="text-sm line-through text-slate-600 dark:text-slate-400 ">
                                                </p>

                                                <span
                                                    class="text-xs font-medium py-1 px-2 bg-orange-100 text-orange-500"
                                                    x-text="-(product.discount * 100 / product.price).toFixed(2) + '%'">
                                                </span>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <div class="mt-2 flex items-center">
                                    <button
                                        @click="$store.cart.removeProduct(product.id, product.variation_id || '', product.variation_value || '')"
                                        class="inline-flex items-center gap-2 text-orange-500 hover:bg-orange-100 text-sm py-1.5 px-3 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                        <span>Remove</span>
                                    </button>



                                    <div class="ms-auto">

                                        <div class="flex items-center space-x-2">
                                            <button
                                                @click="$store.cart.decreaseUserSelectedQuantity(product.id, product.variation_id || '', product.variation_value || '')"
                                                class="bg-slate-100 rounded-md p-1 shadow-md border border-slate-200 flex items-center justify-center text-blue-500"
                                                type="button">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-dash size-5" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                                </svg>
                                            </button>

                                            <div class="p-2 text-sm font-medium" x-text="product.userSelectedQuantity">
                                            </div>

                                            <button
                                                @click="$store.cart.increaseUserSelectedQuantity(product.id, product.variation_id || '', product.variation_value || '')"
                                                class="bg-slate-100 rounded-md p-1 shadow-md border border-slate-200  flex items-center justify-center text-blue-500"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-plus size-5" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </template>
                    </div>
                </div>

                <div class="col-span-1 bg-white dark:bg-slate-800 rounded-md">
                    <div class="border-b border-slate-300 dark:border-slate-700 px-5 py-2">
                        <h6 class="font-medium text-black dark:text-white">Cart Summary</h6>
                    </div>

                    <div class="space-y-1 p-5">
                        <div class="flex items-center justify-between">
                            <span>Subtotal:</span>
                            <span x-text="'$'+ $store.cart.total"></span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span>Tax:</span>
                            <span>$0</span>
                        </div>

                        <div class="border-b border-dashed border-slate-300 dark:border-slate-700"></div>

                        <div class="flex items-center justify-between text-ld font-medium">
                            <span>Total</span>
                            <span x-text="'$'+ $store.cart.total"></span>
                        </div>

                    </div>

                    <div class="p-3">
                        <button
                            class="w-full bg-orange-500 text-white rounded-md text-sm font-medium py-2 hover:bg-orange-500/80 ">CHECKOUT
                            <span x-text="$store.cart.total"></span></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-index-layout>
