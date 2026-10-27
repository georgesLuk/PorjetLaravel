@props([
'couleur' => 'blue',
'type' => 'button'
])

<button
    type="{{ $type }}"
    class="bg-{{ $couleur }}-600 text-white px-4 py-2 rounded"
>
    {{ $slot }}
</button>