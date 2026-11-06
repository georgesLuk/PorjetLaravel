
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JeuxController;

Route::get('/', [JeuxController::class, 'index']);

Route::get('/jeux', [JeuxController::class, 'index']);

Route::get('/jeuxGabarits', [JeuxController::class, 'indexGabarits']);
