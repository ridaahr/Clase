<?php

use App\Http\Controllers\JournalistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hola", function(){
    return "hola mundo!";
});

Route::get("/hola/{name}", function($name){
    return "hola, $name";
});

Route::get("/journalist", [JournalistController::class, "index"]);
//http://127.0.0.1:8000/name/sete
Route::get("/name/{name}", [JournalistController::class, "sayName"]);

//Esto para devolver la vista con el formulario de creación
Route::get("/journalist/create", [JournalistController::class, "create"]);
//Esto es para guardar el journalist con los datos rellenados del formulario de creación
Route::post("/journalist/create", [JournalistController::class, "store"]);
