<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary btn-block text-white']) }}>
    {{ $slot }}
</button>
