<?php

use App\Http\Controllers\HistorialController;

Route::post('/historial', [HistorialController::class, 'store']);
Route::get('/historial', [HistorialController::class, 'index']);

?>
