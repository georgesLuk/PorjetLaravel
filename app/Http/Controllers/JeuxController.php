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

    public function accueil()

    {

        $aLaUne = Jeu::with('images')->inRandomOrder()->first();

        $nouveautes = Jeu::with('images')->orderByDesc('date_sortie')->take(8)->get();

        $populaires = Jeu::with('images')->orderByDesc('popularite')->take(5)->get();

        $totalJeux = Jeu::count();

        $totalStudios = Studio::count();

        $totalVr = Jeu::where('vr', true)->count();

        return view('jeux.accueil', compact('aLaUne', 'nouveautes', 'populaires', 'totalJeux', 'totalStudios', 'totalVr'));

    }

    public function bibliotheque(Request $request)

    {

        $categories = Jeu::selectRaw('categorie, count(*) as total')->groupBy('categorie')->pluck('total', 'categorie');

        $requete = Jeu::with('images', 'studio');

        if ($request->filled('categorie')) {

            $requete->where('categorie', $request->categorie);

        }

        if ($request->filled('recherche')) {

            $requete->where('nom', 'like', '%' . $request->recherche . '%');

        }

        if ($request->tri == 'populaire') {

            $requete->orderByDesc('popularite');

        } elseif ($request->tri == 'recent') {

            $requete->orderByDesc('date_sortie');

        } else {

            $requete->orderBy('nom');

        }

        $jeux = $requete->get();

        $total = Jeu::count();

        return view('jeux.bibliotheque', compact('jeux', 'categories', 'total'));

    }

    private function themes()

    {

        return [

            'Action' => ['description' => 'Combats, courses-poursuites et adrénaline.', 'image' => 'images/gta5.webp', 'couleur' => '#ef4444'],

            'Aventure' => ['description' => 'Explore des mondes immenses.', 'image' => 'images/fortnite.jpg', 'couleur' => '#10b981'],

            'Horreur' => ['description' => 'Survie et frissons garantis.', 'image' => 'images/resident-evil-4.jpg', 'couleur' => '#be123c'],

            'Sport' => ['description' => 'Football, voitures et compétition.', 'image' => 'images/fc26.jpg', 'couleur' => '#3b82f6'],

            'Course' => ['description' => 'Vitesse et circuits.', 'image' => 'images/f1-25.jpg', 'couleur' => '#f97316'],

            'Simulation' => ['description' => 'Construis, gère et crée.', 'image' => 'images/minecraft.jpg', 'couleur' => '#14b8a6'],

        ];

    }

    public function categories()

    {

        $themes = $this->themes();

        $nombres = Jeu::selectRaw('categorie, count(*) as total')->groupBy('categorie')->pluck('total', 'categorie');

        return view('jeux.categories', compact('themes', 'nombres'));

    }

    public function categorie($categorie)

    {

        $theme = $this->themes()[$categorie] ?? ['description' => '', 'image' => 'images/fortnite.jpg', 'couleur' => '#8b5cf6'];

        $jeux = Jeu::with('images', 'studio')->where('categorie', $categorie)->orderByDesc('popularite')->get();

        return view('jeux.categorie', compact('jeux', 'categorie', 'theme'));

    }

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

        $jeu->load('images', 'studio');

        $similaires = Jeu::with('images')

            ->where('categorie', $jeu->categorie)

            ->where('id', '!=', $jeu->id)

            ->take(4)

            ->get();

        return view('jeux.detail', ['jeu' => $jeu, 'similaires' => $similaires]);

    }

    public function modifier(Jeu $jeu)

    {

        $studios = Studio::all();

        return view('jeux.modifier', compact('jeu', 'studios'));

    }

    public function update(Request $request, Jeu $jeu)

    {

        $request->validate([

            'nom' => 'required|min:2|max:100',

            'description' => 'nullable|max:1000',

            'categorie' => 'required',

            'date_sortie' => 'nullable|date',

            'popularite' => 'nullable|integer|min:0',

            'studio_id' => 'nullable|exists:studios,id',

        ]);

        $jeu->nom = $request->nom;

        $jeu->description = $request->description;

        $jeu->categorie = $request->categorie;

        $jeu->date_sortie = $request->date_sortie;

        $jeu->popularite = $request->popularite ?? 0;

        $jeu->vr = $request->boolean('vr');

        $jeu->studio_id = $request->studio_id;

        $jeu->save();

        return redirect()->route('jeux.detail', $jeu->id)

            ->with('success', 'Le jeu a été modifié avec succès !');

    }

}
 