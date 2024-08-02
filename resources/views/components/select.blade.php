<div>
    <select {{ $attributes->merge(['class' => 'block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
        {{ $slot }}
    </select>
</div>
