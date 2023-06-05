
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/inserir', [HomeController::class, 'inserir'])->name('inserir');

Route::post('/filtrar', [HomeController::class, 'filtrar'])->name('filtrar');

Route::post('/search', [HomeController::class, 'search'])->name('search');

Route::post('/editar', [HomeController::class, 'atualizar'])->name('editar');

Route::delete('/excluir/{casa}', [HomeController::class, 'excluir'])->name('excluir');
