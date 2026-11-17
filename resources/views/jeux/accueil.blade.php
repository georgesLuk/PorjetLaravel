@extends('layouts.app')
@section('titre', 'NOVA PLAY - Accueil')
@section('contenu')
<section class="hero">
<div class="hero-content">
<span class="petit-titre">Bienvenue dans ton univers gaming</span>
<h1>Découvre ton prochain <span>jeu préféré.</span></h1>
<p>Action, horreur, sport et réalité virtuelle. Une bibliothèque de jeux incroyables, prête à être explorée.</p>
<a href="{{ route('bibliotheque') }}" class="bouton bouton-violet">Explorer les jeux</a>
<a href="#nouveautes" class="bouton bouton-blanc">Voir les nouveautés</a>
</div>
<img class="hero-visuel" src="{{ asset('images/fortnite.jpg') }}" alt="Jeu à la une">
</section>
<section class="stats">
<div class="stat-carte">
<strong>{{ $totalJeux }}</strong>
<span>Jeux disponibles</span>
</div>
<div class="stat-carte">
<strong>{{ $totalStudios }}</strong>
<span>Studios</span>
</div>
<div class="stat-carte">
<strong>{{ $totalVr }}</strong>
<span>Jeux compatibles VR</span>
</div>
</section>
@if($aLaUne)
<section class="une" style="background-image: url('{{ asset($aLaUne->images->first()->chemin ?? '') }}')">
<div class="une-contenu">
<span class="petit-titre">À la une</span>
<h2>{{ $aLaUne->nom }}</h2>
<p>{{ $aLaUne->description }}</p>
<a href="{{ route('jeux.detail', $aLaUne->id) }}" class="bouton bouton-violet">Découvrir le jeu</a>
</div>
</section>
@endif
<section class="jeux-section" id="nouveautes">
<div class="section-heading">
<h2>Nouveautés</h2>
<span class="nombre-jeux">Fais défiler →</span>
</div>
<div class="defilement">
       @foreach ($nouveautes as $jeu)
<a href="{{ route('jeux.detail', $jeu->id) }}" class="mini">
<img src="{{ asset($jeu->images->first()->chemin ?? '') }}" alt="{{ $jeu->nom }}">
<strong>{{ $jeu->nom }}</strong>
<span>{{ $jeu->categorie }}</span>
</a>
       @endforeach
</div>
</section>
<section class="jeux-section">
<div class="section-heading">
<h2>Top 5 des plus populaires</h2>
</div>
<ol class="classement">
       @foreach ($populaires as $jeu)
<li>
<a href="{{ route('jeux.detail', $jeu->id) }}">
<span class="rang">{{ $loop->iteration }}</span>
<img src="{{ asset($jeu->images->first()->chemin ?? '') }}" alt="{{ $jeu->nom }}">
<div class="classement-info">
<strong>{{ $jeu->nom }}</strong>
<span>{{ $jeu->categorie }}</span>
</div>
<em>{{ $jeu->popularite }}/100</em>
</a>
</li>
       @endforeach
</ol>
</section>
<section class="appel-action">
<h2>Envie de tout voir ?</h2>
<p>Parcours toute la bibliothèque, filtre par catégorie ou cherche un jeu précis.</p>
<a href="{{ route('bibliotheque') }}" class="bouton bouton-violet">Ouvrir la bibliothèque</a>
</section>
@endsection
Dispose d’un menu contextuel