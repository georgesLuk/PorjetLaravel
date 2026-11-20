@extends('layouts.app')
@section('titre', 'NOVA PLAY - ' . $categorie)
@section('contenu')
<section class="cat-banniere" style="--couleur: {{ $theme['couleur'] }}; background-image: url('{{ asset($theme['image']) }}')">
   <div class="cat-banniere-texte">
      <a href="{{ route('categories') }}" class="jeu-link">← Toutes les catégories</a>
      <h1>{{ $categorie }}</h1>
      <p>{{ $theme['description'] }}</p>
      <span class="nombre-jeux">{{ $jeux->count() }} jeux</span>
   </div>
</section>
@if ($jeux->isEmpty())
   <section class="jeux-section">
      <p>Aucun jeu dans cette catégorie pour le moment.</p>
   </section>
@else
   @php $vedette = $jeux->first(); @endphp
<section class="vedette" style="--couleur: {{ $theme['couleur'] }}">
   <img src="{{ asset($vedette->images->first()->chemin ?? '') }}" alt="{{ $vedette->nom }}">
   <div class="vedette-texte">
      <span class="petit-titre">Le plus populaire</span>
      <h2>{{ $vedette->nom }}</h2>
      <p>{{ $vedette->description }}</p>
      <a href="{{ route('jeux.detail', $vedette->id) }}" class="bouton bouton-violet">Découvrir le jeu</a>
   </div>
</section>
@if ($jeux->count() > 1)
   <section class="jeux-section">
      <div class="section-heading">
         <h2>Les autres jeux {{ $categorie }}</h2>
      </div>
      <div class="affiches">
         @foreach ($jeux->skip(1) as $jeu)
            <a href="{{ route('jeux.detail', $jeu->id) }}" class="affiche">
               <img src="{{ asset($jeu->images->first()->chemin ?? '') }}" alt="{{ $jeu->nom }}">
               <div class="affiche-titre">{{ $jeu->nom }}</div>
            </a>
         @endforeach
      </div>
   </section>
@endif
@endif
@endsection
Dispose d’un menu contextuel