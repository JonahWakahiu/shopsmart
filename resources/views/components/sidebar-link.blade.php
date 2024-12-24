@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center rounded-xl gap-2 bg-blue-700/10 px-2 py-1.5 text-sm font-medium text-black underline-offset-2 focus-visible:underline focus:outline-none dark:bg-blue-600/10 dark:text-white'
            : 'flex items-center rounded-xl gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 underline-offset-2 hover:bg-blue-700/5 hover:text-black focus-visible:underline focus:outline-none dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
