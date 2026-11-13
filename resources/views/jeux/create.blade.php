@extends('layouts.app')

@section('titre', 'Ajouter un jeu')

@section('contenu')
<section class="formulaire-page">
    <h1>Ajouter un jeu</h1>
    <p>Remplissez le formulaire pour ajouter un nouveau jeu à NOVA PLAY.</p>

        @if(session('success'))
            <div class="message-succes">{{ session('success') }}</div>

        @endif

    @if($errors->any())
        <div class="message-erreur">
            <ul>

                @foreach($errors->all() as $erreur)
                    <li>{{ $erreur }}</li>

                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{ route('jeux.store') }}" method="POST" enctype="multipart/form-data" class="formulaire">

            @csrf
        <div class="champ">
            <label for="nom">Nom du jeu</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
        </div>
        <div class="champ">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>
        </div>
        <div class="champ">
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie" required>
                <option value="">Choisir une catégorie</option>
                <option value="Action" {{ old('categorie') == 'Action' ? 'selected' : '' }}>Action</option>
                <option value="Aventure" {{ old('categorie') == 'Aventure' ? 'selected' : '' }}>Aventure</option>
                <option value="Horreur" {{ old('categorie') == 'Horreur' ? 'selected' : '' }}>Horreur</option>
                <option value="Sport" {{ old('categorie') == 'Sport' ? 'selected' : '' }}>Sport</option>
                <option value="Course" {{ old('categorie') == 'Course' ? 'selected' : '' }}>Course</option>
                <option value="Simulation" {{ old('categorie') == 'Simulation' ? 'selected' : '' }}>Simulation</option>
            </select>
        </div>
        <div class="champ">
            <label for="date_sortie">Date de sortie</label>
            <input type="date" name="date_sortie" id="date_sortie" value="{{ old('date_sortie') }}">
        </div>
        <div class="champ">
            <label for="popularite">Popularité</label>
            <input type="number" name="popularite" id="popularite" min="0" value="{{ old('popularite', 0) }}">
        </div>
        <div class="champ">
            <label for="studio_id">Studio</label>
            <select name="studio_id" id="studio_id">
                <option value="">Aucun studio</option>
                @foreach($studios as $studio)
                    <option value="{{ $studio->id }}" {{ old('studio_id') == $studio->id ? 'selected' : '' }}>
                        {{ $studio->nom }}
                    </option>

                @endforeach
        </select>
        </div>
        <div class="champ">
            <label for="image">Jaquette du jeu</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>
        <div class="champ-case">
            <input type="checkbox" name="vr" id="vr" value="1" {{ old('vr') ? 'checked' : '' }}>
            <label for="vr">Compatible avec la réalité virtuelle (VR)</label>
        </div>
            <button type="submit" class="bouton bouton-violet">Ajouter le jeu</button>
            <a href="/jeuxGabarits" class="bouton bouton-blanc">Retour</a>
    </form>
</section>

@endsection
 