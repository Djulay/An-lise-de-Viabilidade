@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'mt-1 p-2 w-full border border-gray-700 rounded-lg bg-transparent text-black placeholder-gray-400 ']) }}>
