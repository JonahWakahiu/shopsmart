<x-customer-layout>
    <div class="pt-24 pb-12 grid place-items-center " x-data="checkoutSuccess">
        <div class="flex flex-col items-center">
            <div class="flex items-center rounded-full justify-center p-5 bg-white dark:bg-slate-800 ">
                <div class="rounded-full p-5 bg-green-100 dark:bg-green-900 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-12 stroke-[4] text-green-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
            </div>

            <p class="font-medium text-xl mt-5 mb-2">Thanks for your order {{ $customerName }}</p>
            <p class="font-medium">Order Id: {{ $orderNumber }}</p>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('checkoutSuccess', () => ({
                    init() {
                        this.$store.cart.clearCart();
                    }
                }))
            })
        </script>
    @endpush
</x-customer-layout>
