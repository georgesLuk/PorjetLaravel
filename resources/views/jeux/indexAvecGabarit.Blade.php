@extends('layouts.app')

@section('titre', 'Nova Play - Bibliothèque de jeux')

@section('contenu')
<section class="luna-hero">
<div class="hero-overlay">
<div class="hero-text">
<span class="eyebrow">À LA UNE</span>
<h1>Ton prochain monde<br>t'attend.</h1>
<p>

                Découvre des aventures extraordinaires,

                des jeux de sport et des univers à explorer.
</p>
<a href="#bibliotheque" class="btn-primary">

                Explorer les jeux <span>→</span>
</a>
</div>
</div>
</section>
<section class="catalogue" id="bibliotheque">
<div class="catalogue-header">
<div>
<span class="eyebrow">TA PROCHAINE AVENTURE</span>
<h2>Jeux populaires</h2>
</div>
<span class="game-count">{{ count($jeux) }} jeux</span>
</div>
<div class="filter-list">
<a href="#bibliotheque" class="filter active">Tous les jeux</a>
<a href="#action" class="filter">Action</a>
<a href="#aventure" class="filter">Aventure</a>
<a href="#sport" class="filter">Sport</a>
<a href="#course" class="filter">Course</a>
</div>
<div class="game-grid">

        @foreach ($jeux as $jeu)
<article class="game-card">
<a href="#bibliotheque" class="game-cover">
<img

                        src="{{ $jeu['image'] }}"

                        alt="{{ $jeu['nom'] }}"

                        loading="lazy"
>
<span class="cover-category">

                        {{ $jeu['categorie'] }}
</span>
<span class="cover-play">Voir le jeu ↗</span>
</a>
<div class="game-details">
<div>
<h3>{{ $jeu['nom'] }}</h3>
<p>{{ $jeu['description'] }}</p>
</div>
<span class="game-arrow">↗</span>
</div>
</article>

        @endforeach
</div>
</section>
<section class="discover-banner">
<div>
<span class="eyebrow">UNIVERS À EXPLORER</span>
<h2>Il y a toujours<br>un jeu pour toi.</h2>
<p>Action, aventure, sport ou course : choisis ton univers.</p>
</div>
<a href="#bibliotheque" class="btn-primary">

        Voir la bibliothèque →
</a>
</section>

@endsection
 