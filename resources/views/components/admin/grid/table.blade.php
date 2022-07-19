<table {{ $attributes->merge(['class' => 'border-collapse table-auto w-full text-sm']) }}>
    <thead>
        {{ $head }}
    </thead>

    <tbody class="bg-white dark:bg-slate-800">
        {{ $body }}
    </tbody>
</table>