<x-app-layout>
    <div class="py-12" x-data="orderDetail">

        <div class="bg-white rounded-md w-full">
            <div class="px-3 py-2 border-b border-slate-300 dark:border-slate-700">
                <p class="text-lg font-medium text-black dark:text-white">Order Details</p>
            </div>

            <div class="p-5">
                <div class="space-y-1">
                    <p>Order <span x-text="order.order_number"></span></p>
                    <p class="text-sm text-slate-600 dark:text-slate-400"> Items: <span
                            x-text="order.products_count"></span></p>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Placed on: <span
                            x-text="new Date(order.created_at).toLocaleString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true
                        })"></span>
                    </p>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Total: <span
                            x-text="'$' + order.total_price"></span></p>
                </div>

                <div class="border-b border-slate-200 dark:border-800 my-4"></div>

                <div class="flex items-center justify-between">
                    <p class="font-medium uppercase">Items In your Order</p>

                    <a :href="`{{ route('orders.track', '__order__') }}`.replace('__order__', order.id)"
                        class="text-orange-500 text-sm">See Status History</a>
                </div>

                <div class="flex flex-col gap-5">
                    <template x-for="product in order.products" :key="product.id">
                        <div
                            class="border border-slate-300 dark:border-slate-700 rounded-md p-5 flex items-start gap-5">
                            <div class="size-20 rounded-md overflow-hidden">
                                <img :src="product.oldest_image.url" :alt="product.name"
                                    class="w-full h-full object-cever object-center">
                            </div>

                            <div>
                                <p x-text="product.name" class="font-medium text-black dark:text-white capitalize"></p>
                                <p class="text-slate-600 dark:text-slate-400 text-sm">Quantity: <span
                                        x-text="product.pivot.quantity"></span></p>

                                <div class="flex gap-3 items-baseline">
                                    <span
                                        x-text="product.pivot.price_at_order - product.pivot.discount_at_order"></span>
                                    <span class="line-through text-slate-600 dark:text-slate-400 text-sm"
                                        x-text="product.pivot.price_at_order"></span>
                                </div>

                            </div>
                        </div>

                    </template>
                </div>
                <div></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('orderDetail', () => ({
                    order: {},

                    init() {
                        this.order = @json($order);
                        console.log(this.order);
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
