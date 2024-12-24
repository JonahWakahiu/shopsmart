<div class="relative flex flex-col gap-1 text-slate-700 dark:text-slate-300">

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
        class="absolute left-2 top-1/2 size-5 -translate-y-1/2 text-slate-700/50 dark:text-slate-300/50"
        aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>

    <input type="search"
        {{ $attributes->merge(['class' => 'w-full border border-slate-300 rounded-lg bg-white px-2 py-1.5 pl-9 text-sm disabled:cursor-not-allowed disabled:opacity-75 dark:border dark:border-slate-700 dark:bg-slate-900/50 dark:focus-visible:outline-blue-600']) }}>
</div>
