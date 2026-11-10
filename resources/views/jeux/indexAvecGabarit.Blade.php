
@extends('layouts.app')

@section('titre', 'Steam - Bibliothèque de jeux')

@section('contenu')

<section class="hero">
    <div class="hero-content">
        <span class="petit-titre">Bienvenue dans ton univers gaming</span>
        <h1>Découvre ton prochain <span>jeu préféré.</span></h1>
        <p>Action, horreur, sport et réalité virtuelle. Une bibliothèque de jeux incroyables, prête à être explorée.</p>
        <a href="#bibliotheque" class="bouton bouton-violet">Explorer les jeux</a>
        <a href="#bibliotheque" class="bouton bouton-blanc">Voir les nouveautés</a>
    </div>
    <img class="hero-visuel" src="{{ asset('images/fortnite.jpg') }}" alt="Jeu à la une">
</section>

<div class="library" id="bibliotheque">

    @php
        $sections = [
            'Nouveautés' => $nouveautes,
            'Jeux d’horreur' => $horreur,
            'Jeux d’action' => $action,
            'Réalité virtuelle' => $vr,
            'Jeux de sport' => $sports,
            'Les plus populaires' => $populaires,
            'Les moins populaires' => $moinsPopulaires
        ];
    @endphp

    @foreach ($sections as $titre => $jeux)
        <section class="jeux-section">
            <div class="section-heading">
                <h2>{{ $titre }}</h2>
                <span class="nombre-jeux">{{ $jeux->count() }} jeux</span>
            </div>
            @if ($jeux->isEmpty())
                <p>Aucun jeu disponible dans cette section pour le moment.</p>
            @else
            <div class="jeux-grid">
                    @foreach ($jeux as $jeu)
                        <x-show :jeu="$jeu" />
                    @endforeach
            </div>
            @endif
        </section>
    @endforeach

</div>

@endsection
