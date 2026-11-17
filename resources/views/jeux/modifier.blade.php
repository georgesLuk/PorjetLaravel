@extends('layouts.app')

@section('titre', 'Modifier ' . $jeu->nom)

@section('contenu')
<section class="formulaire-page">
<h1>Modifier le jeu</h1>
<p>Page de modification du jeu {{ $jeu->nom }}</p>

    @if($errors->any())
<div class="message-erreur">
<ul>

                @foreach($errors->all() as $erreur)
<li>{{ $erreur }}</li>

                @endforeach
</ul>
</div>

    @endif
    <form method="POST" action="{{ route('jeux.update', $jeu->id) }}" class="formulaire">

        @csrf
        @method('PUT')

        <div class="champ">
            <label for="nom">Nom du jeu</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $jeu->nom) }}" required>
        </div>

        <div class="champ">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $jeu->description) }}</textarea>
        </div>

        <div class="champ">
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie" required>
                <option value="">Choisir une catégorie</option>

                    @foreach(['Action', 'Aventure', 'Horreur', 'Sport', 'Course', 'Simulation'] as $categorie)
                        <option value="{{ $categorie }}" {{ old('categorie', $jeu->categorie) == $categorie ? 'selected' : '' }}>

                            {{ $categorie }}
                        </option>

                    @endforeach
            </select>
        </div>

        <div class="champ">
            <label for="date_sortie">Date de sortie</label>
            <input type="date" id="date_sortie" name="date_sortie" value="{{ old('date_sortie', $jeu->date_sortie) }}">
        </div>

        <div class="champ">
            <label for="popularite">Popularité</label>
            <input type="number" id="popularite" name="popularite" min="0" value="{{ old('popularite', $jeu->popularite) }}">
        </div>

        <div class="champ">
            <label for="studio_id">Studio</label>
            <select name="studio_id" id="studio_id">
                <option value="">Aucun studio</option>

                @foreach($studios as $studio)
                    <option value="{{ $studio->id }}" {{ old('studio_id', $jeu->studio_id) == $studio->id ? 'selected' : '' }}>

                        {{ $studio->nom }}
                    </option>

                @endforeach
            </select>
        </div>

        <div class="champ-case">
            <input type="checkbox" id="vr" name="vr" value="1" {{ old('vr', $jeu->vr) ? 'checked' : '' }}>
            <label for="vr">Compatible avec la réalité virtuelle (VR)</label>
        </div>
        
        <button type="submit" class="bouton bouton-violet">Enregistrer</button>
        <a href="{{ route('jeux.detail', $jeu->id) }}" class="bouton bouton-blanc">Annuler</a>
    </form>
</section>

@endsection
 