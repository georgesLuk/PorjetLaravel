<?php

namespace App\Http\Controllers;

use App\Models\Jeu;

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
}
