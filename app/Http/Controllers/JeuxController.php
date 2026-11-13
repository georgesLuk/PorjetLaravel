<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Studio;
use Illuminate\Http\Request;

class JeuxController extends Controller
{
    public function index()
    {
        $nouveautes = Jeu::with(['images', 'studio'])
            ->orderBy('date_sortie', 'desc')
            ->limit(10)->get();

        $horreur = Jeu::with(['images', 'studio'])
            ->where('categorie', 'Horreur')->get();

        $action = Jeu::with(['images', 'studio'])
            ->where('categorie', 'Action')->get();

        $vr = Jeu::with(['images', 'studio'])
            ->where('vr', true)->get();

        $sports = Jeu::with(['images', 'studio'])
            ->where('categorie', 'Sport')->get();

        $populaires = Jeu::with(['images', 'studio'])
            ->orderBy('popularite', 'desc')
            ->limit(10)->get();

        $moinsPopulaires = Jeu::with(['images', 'studio'])
            ->orderBy('popularite', 'asc')
            ->limit(10)->get();

        return view('jeux.indexAvecGabarit', [
            'nouveautes' => $nouveautes,
            'horreur' => $horreur,
            'action' => $action,
            'vr' => $vr,
            'sports' => $sports,
            'populaires' => $populaires,
            'moinsPopulaires' => $moinsPopulaires
        ]);
    }

    public function indexGabarits()
    {
        return $this->index();
    }

    // Afficher le formulaire pour ajouter un jeu
    public function create()

    {

        $studios = Studio::all();

        return view('jeux.create', compact('studios'));

    }

    public function store(Request $request)

    {

        $request->validate([

            'nom' => 'required|min:2|max:100',

            'description' => 'nullable|max:1000',

            'categorie' => 'required',

            'date_sortie' => 'nullable|date',

            'popularite' => 'nullable|integer|min:0',

            'studio_id' => 'nullable|exists:studios,id',

            'image' => 'nullable|image|max:4096',

        ]);

        $jeu = Jeu::create([

            'nom' => $request->nom,

            'description' => $request->description,

            'categorie' => $request->categorie,

            'date_sortie' => $request->date_sortie,

            'popularite' => $request->popularite ?? 0,

            'vr' => $request->boolean('vr'),

            'studio_id' => $request->studio_id,

        ]);

        if ($request->hasFile('image')) {

            $fichier = $request->file('image');

            $nomFichier = $fichier->getClientOriginalName();

            $fichier->move(public_path('images'), $nomFichier);

            $jeu->images()->create(['chemin' => 'images/' . $nomFichier]);

        }

        return redirect()->route('jeux.create')->with('success', 'Le jeu a été ajouté avec succès !');

    }

    public function detail(Jeu $jeu)

    {

        $jeu->load('images');

        return view('jeux.detail', ['jeu' => $jeu]);

    }
 
}
