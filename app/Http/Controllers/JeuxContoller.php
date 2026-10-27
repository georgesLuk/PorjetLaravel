<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JeuxContoller extends Controller

{

    public function index()

    {

        return view('jeux.index');

    }

    public function indexGabarits()

    {

        $jeux = [

            [

                'nom' => 'Fortnite',

                'categorie' => 'Action',

                'description' => 'Affronte les autres joueurs et sois le dernier survivant.',

                'image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=900&q=80'

            ],

            [

                'nom' => 'Cyberpunk 2077',

                'categorie' => 'Aventure',

                'description' => 'Explore une ville futuriste pleine de possibilités.',

                'image' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=900&q=80'

            ],

            [

                'nom' => 'Jeu de course',

                'categorie' => 'Course',

                'description' => 'Prends le volant et dépasse tes adversaires.',

                'image' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=900&q=80'

            ],

            [

                'nom' => 'Jeu de stratégie',

                'categorie' => 'Stratégie',

                'description' => 'Prépare ton plan et mène ton équipe à la victoire.',

                'image' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=900&q=80'

            ],

            [

                'nom' => 'Jeu de sport',

                'categorie' => 'Sport',

                'description' => 'Entre sur le terrain et démontre ton talent.',

                'image' => 'https://images.unsplash.com/photo-1522778119026-d647f0596c20?auto=format&fit=crop&w=900&q=80'

            ],

            [

                'nom' => 'Jeu multijoueur',

                'categorie' => 'Multijoueur',

                'description' => 'Joue avec tes amis et relève de nouveaux défis.',

                'image' => 'https://images.unsplash.com/photo-1547394765-185e1e68f34e?auto=format&fit=crop&w=900&q=80'

            ]

        ];

        return view('jeux.indexAvecGabarit', compact('jeux'));

    }

}
 