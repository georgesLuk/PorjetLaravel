<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model

{

    protected $fillable = [

        'jeu_id',

        'chemin'

    ];

    public function jeu()

    {

        return $this->belongsTo(Jeu::class);

    }

}
 