<input type="date" x-data="flatpicker"
    {{ $attributes->merge(['class' => 'flatpicker rounded-md w-full border-slate-300 text-sm py-2 px-3 hover:border-blue-500']) }}>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('flatpicker', () => ({

                init() {
                    const tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 1);

                    flatpickr(".flatpicker", {
                        enableTime: true,
                        minDate: tomorrow,
                        dateFormat: 'Y-m-d h:s',
                        defaultDate: tomorrow,
                    })
                }
            }))
        })
    </script>
@endpush
