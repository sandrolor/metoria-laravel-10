<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix('produtos')->group(function(){
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function(){
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('vendas')->group(function(){
    Route::get('/', [VendasController::class, 'index'])->name('venda.index');
    Route::get('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::get('/atualizarVenda/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
    Route::put('/atualizarVenda/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
    Route::delete('/delete', [VendasController::class, 'delete'])->name('venda.delete');
    Route::get('/enviaComprovantePorEmail/{id}', [VendasController::class, 'enviaComprovantePorEmail'])->name('enviacomprovante.venda'); 
});

Route::prefix('users')->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('user.index');
    Route::get('/cadastrarUser', [UsersController::class, 'cadastrarUser'])->name('cadastrar.user');
    Route::post('/cadastrarUser', [UsersController::class, 'cadastrarUser'])->name('cadastrar.user');
    Route::get('/atualizarUser/{id}', [UsersController::class, 'atualizarUser'])->name('atualizar.user');
    Route::put('/atualizarUser/{id}', [UsersController::class, 'atualizarUser'])->name('atualizar.user');
    Route::delete('/delete', [UsersController::class, 'delete'])->name('user.delete');
});