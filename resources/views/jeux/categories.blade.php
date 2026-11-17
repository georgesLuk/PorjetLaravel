@extends('layouts.app')
@section('titre', 'NOVA PLAY - Catégories')
@section('contenu')
<section class="biblio-entete">
<h1>Catégories</h1>
<p>Choisis ton style de jeu.</p>
</section>
<section class="bandes">
   @foreach ($themes as $nom => $theme)
<a href="{{ route('categories.voir', $nom) }}" class="bande" style="--couleur: {{ $theme['couleur'] }}">
<div class="bande-texte">
<h2>{{ $nom }}</h2>
<p>{{ $theme['description'] }}</p>
</div>
<div class="bande-nombre">
<strong>{{ $nombres[$nom] ?? 0 }}</strong>
<span>jeux</span>
</div>
<div class="bande-image" style="background-image: url('{{ asset($theme['image']) }}')"></div>
</a>
   @endforeach
</section>
@endsection