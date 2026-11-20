<?php
use App\Http\Controllers\JeuxController;
use Illuminate\Support\Facades\Route;
Route::get('/', [JeuxController::class, 'accueil'])->name('accueil');
Route::get('/bibliotheque', [JeuxController::class, 'bibliotheque'])->name('bibliotheque');
Route::get('/categories', [JeuxController::class, 'categories'])->name('categories');
Route::get('/categories/{categorie}', [JeuxController::class, 'categorie'])->name('categories.voir');
Route::get('/jeux/create', [JeuxController::class, 'create'])->name('jeux.create');
Route::post('/jeux', [JeuxController::class, 'store'])->name('jeux.store');
Route::get('/jeux/{jeu}/modifier', [JeuxController::class, 'modifier'])->name('jeux.modifier');
Route::put('/jeux/{jeu}', [JeuxController::class, 'update'])->name('jeux.update');
Route::get('/jeux/{jeu}', [JeuxController::class, 'detail'])->name('jeux.detail');
Route::delete('/jeux/{id}', [JeuxController::class, 'destroy'])->name('jeux.destroy');