<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
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

Route::get('/', function () {
    //return view('welcome');
    return "bem-vindo";
});

Route::get('/aluno',
    [AlunoController::class,'index'])->name('aluno.index'); //get envia os dados por url TRABALHANDO COM ROTAS - METODO GET PEGA OS DADOS

Route::get('/aluno/create',
    [AlunoController::class,'create'])->name('aluno.create');

Route::post('/aluno/store',
    [AlunoController::class,'store'])->name('aluno.store'); //post envia os dados de forma oculta pelo servidor TRABALHANDO COM ROTAS - METODO POST ENVIA OS DADOS

    Route::delete('<aluno/{id}',
    [AlunoController::class,'destroy'])
    ->name('aluno.destroy'); //deleta os dados na tabela alauno


Route::get('/aluno/edit/{id}',
[AlunoController::class,'edit'])->name('aluno.edit');


Route::put('/aluno/update/{id}php artisan serve',
    [AlunoController::class,'update'])->name('aluno.update');

Route::post('/aluno/search',
    [AlunoController::class,'search'])->name('aluno.search');

