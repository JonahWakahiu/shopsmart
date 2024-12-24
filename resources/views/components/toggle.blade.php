<label class="inline-flex cursor-pointer items-center gap-3">
    <input type="checkbox" {{ $attributes->merge(['class' => 'peer sr-only hidden']) }} />

    <div class="relative h-5 w-9 after:h-4 after:w-4 peer-checked:after:translate-x-4 rounded-full border border-slate-300 bg-slate-100 after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-slate-700 after:transition-all after:content-[''] peer-checked:bg-blue-700 peer-checked:after:bg-slate-100 peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-slate-700 dark:bg-slate-800 dark:after:bg-slate-300 dark:peer-checked:bg-blue-600 dark:peer-checked:after:bg-slate-100 dark:peer-focus:outline-slate-300 dark:peer-focus:peer-checked:outline-blue-600"
        aria-hidden="true"></div>
</label>
