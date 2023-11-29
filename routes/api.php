<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('produtos', [ProdutosController::class, 'index']);
Route::post('produtos', [ProdutosController::class, 'store']);
Route::get('produtos/{id}', [ProdutosController::class, 'show']);
Route::put('produtos/{id}', [ProdutosController::class, 'update']);
Route::delete('produtos/{id}', [ProdutosController::class, 'destroy']);
