<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\RegisterController;
use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CursoController::class,'index']);
Route::get('/curso/{curso}', [CursoController::class,'show']);

Route::get('/register', [RegisterController::class,'create']);
Route::post('/register', [RegisterController::class,'store']);

Route::get('/Area-Admin', function () {
    return view('A_adm');
});

Route::get('/Area-Secretaria', function () {
    return view('A_sec');
});

Route::get('/Area-Professor', function () {
    return view('A_prof');
});

Route::get('/Area-Aluno', function () {
    return view('A_alu');
});