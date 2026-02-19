<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, "index"])->name("index");
Route::delete('/client/{id}', [ClientController::class, "destroy"])->name('client.destroy');
Route::get('/client/create', [ClientController::class, "create"])->name("client.create");
Route::post('/client', [ClientController::class, "store"])->name("client.store");
Route::get('/order/create', [OrderController::class, "create"])->name("order.create");
Route::post('/order', [OrderController::class, "store"])->name("order.store");
Route::delete('/order/{id}', [OrderController::class, "destroy"])->name("order.destroy");

//opcionales
Route::get("/product/search", [ProductController::class, "search"])->name('product.search');
Route::get("/product/search", [ProductController::class, "showProducts"]);

//AUTENTICACIÓN
//Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    // Dashboard (solo para usuarios logueados)
    Route::get('/dashboard', [
        UserController::class,
        'index'
    ])->name('dashboard');
    // Logout (Fortify no incluye logout automático, lo tenemos
    //que implementar)
    Route::get('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Sesión cerrada
correctamente');
    })->name('logout');
});
