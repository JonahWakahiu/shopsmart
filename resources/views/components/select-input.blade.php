<select
    {{ $attributes->merge(['class' => 'text-sm border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-600 rounded-md shadow-sm py-1.5']) }}>
    {{ $slot }}
</select>
