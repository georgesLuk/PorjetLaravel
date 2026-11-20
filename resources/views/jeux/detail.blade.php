@extends('layouts.app')
@section('titre', $jeu->nom)
@section('contenu')
@if(session('success'))
<div class="message-succes detail-message">{{ session('success') }}</div>
@endif
<section class="detail">
    <img class="detail-image" src="{{ asset($jeu->images->first()->chemin ?? '') }}" alt="{{ $jeu->nom }}">
    <div class="detail-info">
        <div class="detail-badges">
            <span class="jeu-categorie">{{ $jeu->categorie }}</span>
            @if($jeu->vr)
                <span class="badge-vr">Compatible VR</span>
            @endif
        </div>
        <h1>{{ $jeu->nom }}</h1>
        <p class="detail-studio">
            Développé par <strong>{{ $jeu->studio->nom ?? 'Studio inconnu' }}</strong>
        </p>

        <p class="detail-description">{{ $jeu->description }}</p>

        <div class="popularite">
            <div class="popularite-titre">
                <span>Popularité</span>
                <strong>{{ $jeu->popularite }}/100</strong>
            </div>
            <div class="popularite-barre">
                <div class="popularite-remplissage" style="width: {{ $jeu->popularite }}%"></div>
            </div>
        </div>
        <div class="detail-actions">
            <a href="{{ route('jeux.modifier', $jeu->id) }}" class="bouton bouton-violet">Modifier</a>
            <a href="/jeuxGabarits" class="bouton bouton-blanc">Retour aux jeux</a>
        </div>
        <form method="POST" action="{{ route('jeux.destroy', $jeu->id) }}" onsubmit="return confirm('Supprimer ce jeu ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bouton bouton-danger">Supprimer</button>
        </form>
    </div>
</section>

<section class="fiche">
    <h2>Fiche technique</h2>
    <div class="fiche-grille">
        <div class="fiche-carte">
            <span>Date de sortie</span>
            strong>{{ $jeu->date_sortie ? \Carbon\Carbon::parse($jeu->date_sortie)->format('d/m/Y') : 'Non précisée' }}</strong>
        </div>
        <div class="fiche-carte">
            <span>Catégorie</span>
            <strong>{{ $jeu->categorie }}</strong>
        </div>
        <div class="fiche-carte">
            <span>Studio</span>
            <strong>{{ $jeu->studio->nom ?? 'Inconnu' }}</strong>
        </div>
        <div class="fiche-carte">
            <span>Réalité virtuelle</span>
            <strong>{{ $jeu->vr ? 'Oui' : 'Non' }}</strong>
        </div>
    </div>
    </section>
    @if($similaires->isNotEmpty())
        <section class="jeux-section">
        <div class="section-heading">
            <h2>Dans la même catégorie</h2>
            <span class="nombre-jeux">{{ $similaires->count() }} jeux</span>
        </div>
        <div class="jeux-grid">
            @foreach($similaires as $similaire)
                <x-show :jeu="$similaire" />
            @endforeach
        </div>
</section>
@endif
@endsection