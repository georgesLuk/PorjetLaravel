@props(['jeu'])
<div class="jeu-card">
    <div class="jeu-image">
       <img src="{{ asset($jeu->images->first()->chemin ?? '') }}" alt="{{ $jeu->titre }}">
 
    </div>
    <span class="jeu-categorie">{{ $jeu->categorie }}</span>
    <div class="jeu-info">
        <h3>{{ $jeu->titre }}</h3>
        <p>{{ $jeu->description }}</p>
        <a href="#" class="jeu-link">Découvrir le jeu →</a>
    </div>
</div>