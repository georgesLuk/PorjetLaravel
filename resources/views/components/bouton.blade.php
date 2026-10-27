<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
</div>
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