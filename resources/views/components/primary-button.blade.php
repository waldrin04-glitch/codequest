<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-primary-600 to-primary-700 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wider shadow-md hover:shadow-lg hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 active:from-primary-800 active:to-primary-900 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
