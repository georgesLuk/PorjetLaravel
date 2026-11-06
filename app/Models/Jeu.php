<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table = 'jeux';

    protected $fillable = [
        'studio_id',
        'nom',
        'description',
        'categorie',
        'date_sortie',
        'popularite',
        'vr'
    ];

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}