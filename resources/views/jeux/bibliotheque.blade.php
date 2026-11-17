@extends('layouts.app')
@section('titre', 'NOVA PLAY - Bibliothèque')
@section('contenu')
<div class="biblio">
<aside class="biblio-filtres">
<h1>Bibliothèque</h1>
<form action="{{ route('bibliotheque') }}" method="GET" class="biblio-recherche">
           @if(request('categorie'))
<input type="hidden" name="categorie" value="{{ request('categorie') }}">
           @endif
<input type="text" name="recherche" value="{{ request('recherche') }}" placeholder="Rechercher...">
</form>
<h3>Catégories</h3>
<ul class="filtre-liste">
<li class="{{ request('categorie') ? '' : 'actif' }}">
<a href="{{ route('bibliotheque') }}">Tous <span>{{ $total }}</span></a>
</li>
           @foreach ($categories as $nom => $nombre)
<li class="{{ request('categorie') == $nom ? 'actif' : '' }}">
<a href="{{ route('bibliotheque', ['categorie' => $nom]) }}">{{ $nom }} <span>{{ $nombre }}</span></a>
</li>
           @endforeach
</ul>
<h3>Trier par</h3>
<ul class="filtre-liste">
<li class="{{ request('tri') ? '' : 'actif' }}">
<a href="{{ route('bibliotheque', array_merge(request()->query(), ['tri' => ''])) }}">Nom</a>
</li>
<li class="{{ request('tri') == 'populaire' ? 'actif' : '' }}">
<a href="{{ route('bibliotheque', array_merge(request()->query(), ['tri' => 'populaire'])) }}">Popularité</a>
</li>
<li class="{{ request('tri') == 'recent' ? 'actif' : '' }}">
<a href="{{ route('bibliotheque', array_merge(request()->query(), ['tri' => 'recent'])) }}">Plus récents</a>
</li>
</ul>
</aside>
<section class="biblio-liste">
<div class="section-heading">
<h2>{{ request('categorie') ?? 'Tous les jeux' }}</h2>
<span class="nombre-jeux">{{ $jeux->count() }} jeux</span>
</div>
       @forelse ($jeux as $jeu)
<article class="ligne">
<img class="ligne-image" src="{{ asset($jeu->images->first()->chemin ?? '') }}" alt="{{ $jeu->nom }}">
<div class="ligne-info">
<div class="ligne-titre">
<h3>{{ $jeu->nom }}</h3>
<span class="jeu-categorie">{{ $jeu->categorie }}</span>
</div>
<p class="ligne-studio">{{ $jeu->studio->nom ?? 'Studio inconnu' }}</p>
<p>{{ $jeu->description }}</p>
</div>
<div class="ligne-droite">
<strong>{{ $jeu->popularite }}<small>/100</small></strong>
<a href="{{ route('jeux.detail', $jeu->id) }}" class="bouton bouton-violet">Voir</a>
</div>
</article>
       @empty
<p>Aucun jeu ne correspond à ta recherche.</p>
       @endforelse
</section>
</div>
@endsection
Dispose d’un menu contextuel