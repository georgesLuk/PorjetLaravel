@props([
   'couleur' => 'violet',
   'type' => 'button'
])
<button
   type="{{ $type }}"
   {{ $attributes->merge(['class' => 'bouton bouton-' . $couleur]) }}
>
   {{ $slot }}
</button>