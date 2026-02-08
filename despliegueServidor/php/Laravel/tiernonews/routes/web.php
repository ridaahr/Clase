<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JournalistController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hola", function () {
    return "hola mundo!";
});

Route::get("/hola/{name}", function ($name) {
    return "hola, $name";
});

Route::get("/journalist", [JournalistController::class, "index"])->name('journalist');

//http://127.0.0.1:8000/name/sete
Route::get("/name/{name}", [JournalistController::class, "sayName"]);
//Esto para devolver la vista con el formulario de creación
// Al darle un nombre a la ruta, luego la puedo utilizar para referenciarla desde el resto de mi proyecto
Route::get("/journalist/create", [JournalistController::class, "create"])->name('journalist.create');

//Esto es para guardar el journalist con los datos rellenados del formulario de creación
Route::post("/journalist", [JournalistController::class, "store"])->name('journalist.store');

Route::get("/journalist/{id}", [JournalistController::class, "show"]);
Route::get("/journalist/{id}/edit", [JournalistController::class, "edit"]);
Route::get("/journalist/{id}/edit", [JournalistController::class, "edit"])->name('journalist.edit');
Route::put("/journalist/{id}", [JournalistController::class, "update"])->name('journalist.update');
Route::delete("/journalist/{id}", [JournalistController::class, "destroy"]);
Route::delete("journalist/{id}", [JournalistController::class, "destroy"])->name('journalist.destroy');

Route::resource("/article", ArticleController::class);