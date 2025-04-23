<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\Auth\VerificacaoController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Rota para a página inicial
Route::get('/', [ProdutoController::class, 'publico'])->name('home');

// Rotas de registro
Route::get('/registrar', [RegisterController::class, 'showForm'])->name('registrar.form');
Route::post('/registrar', [RegisterController::class, 'register'])->name('registrar');

// Rotas de verificação de email (2FA)
Route::get('/verificar-email', [VerificacaoController::class, 'showForm'])->name('verificar.form');
Route::post('/verificar-email', [VerificacaoController::class, 'verificar'])->name('verificar.codigo');

// Rota para o login (caso precise de uma rota personalizada)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Rota para o dashboard protegida por middleware de autenticação
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard'); // Certifique-se de ter uma view chamada 'dashboard.blade.php'
})->name('dashboard');

// Rotas do CRUD de produtos (já usando o Resource Controller)
Route::middleware(['auth'])->group(function () {
    Route::resource('produtos', ProdutoController::class);
});

// rota para vizualizar os produto
Route::get('/produtos-publico', [ProdutoController::class, 'publico'])->name('produtos.publico');

// Rota para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



