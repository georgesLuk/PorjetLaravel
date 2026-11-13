
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JeuxController;

Route::get('/', [JeuxController::class, 'index']);

Route::get('/jeux', [JeuxController::class, 'index']);

Route::get('/jeuxGabarits', [JeuxController::class, 'indexGabarits']);

// Afficher le formulaire
Route::get('/jeux/create', [JeuxController::class, 'create'])
    ->name('jeux.create');

// Enregistrer le jeu
Route::post('/jeux', [JeuxController::class, 'store'])
    ->name('jeux.store');

Route::get('/jeux', [JeuxController::class, 'index'])
    ->name('jeux.index');
Route::get('/jeux', [JeuxController::class, 'detail'])
    ->name('jeux.detail');