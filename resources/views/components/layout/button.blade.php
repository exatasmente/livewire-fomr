<button {{ $attributes->merge(['type' => 'submit'])}}  {{ $attributes->class(['inline-flex', 'items-center', 'px-4', 'py-2', 'bg-purple-500', 'border', 'border-transparent', 'rounded-md', 'font-semibold', 'text-xs', 'text-white', 'uppercase', 'tracking-widest', 'hover:bg-purple-700', 'active:bg-purple-900', 'focus:outline-none', 'focus:border-gray-900', 'focus:shadow-outline-gray', 'disabled:opacity-25', 'transition' ,'ease-in-out', 'duration-150']) }}>
    {{ $slot }}
</button>
