
@props(['jeu'])

@php
    $image = optional($jeu->images->first())->chemin;
@endphp

<article class="game-card">

    <div class="game-image">
        @if ($image)
            <img src="{{ asset($image) }}" alt="{{ $jeu->nom }}">
        @else
            <div class="no-image">Image non disponible</div>
        @endif

        <div class="game-description">
            <span>{{ $jeu->categorie }}</span>
            <p>{{ $jeu->description }}</p>

            @if ($jeu->studio)
                <small>Studio : {{ $jeu->studio->nom }}</small>
            @endif
        </div>
    </div>

    <div class="game-info">
        <h3>{{ $jeu->nom }}</h3>
        <span>★ {{ $jeu->popularite }}</span>
    </div>

</article>
