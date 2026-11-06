
@extends('layouts.app')

@section('titre', 'Steam - Bibliothèque de jeux')

@section('contenu')

<section class="welcome-banner">
    <div>
        <span class="subtitle">BIENVENUE DANS TON UNIVERS GAMING</span>
        <h1>Découvre ton prochain jeu préféré.</h1>
        <p>Des aventures, de l'action et des expériences incroyables.</p>
    </div>
</section>

<div class="library">

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
        <section class="game-section">

            <div class="section-title">
                <h2>{{ $titre }}</h2>
                <span>{{ $jeux->count() }} jeux</span>
            </div>

            @if ($jeux->isEmpty())
                <p class="empty-games">
                    Aucun jeu disponible dans cette section pour le moment.
                </p>
            @else
                <div class="game-list">
                    @foreach ($jeux as $jeu)
                        <x-show :jeu="$jeu" />
                    @endforeach
                </div>
            @endif

        </section>
    @endforeach

</div>

@endsection
