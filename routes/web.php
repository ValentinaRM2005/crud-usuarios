<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

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


//Al ingresar a la carpeta raíz, entra al controlador y se ejecuta el método index
Route::get("/", [CrudController::class, "index"]) -> name("crud.index");

//Ruta para agregar un usuario
Route::post("/registrar_usuario", [CrudController::class, "create"]) -> name("crud.create");

//Ruta para editar un usuario
Route::post("/editar_usuario", [CrudController::class, "update"]) -> name("crud.update");

//Ruta para eliminar un usuario
Route::get("/eliminar_usuario-{id}", [CrudController::class, "delete"]) -> name("crud.delete");