<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function(){
    echo "Hola mundo.";
});

Route::get('/hola/{nombre}', function($nombre){
    echo "Hola $nombre.";
});
//Si no me llega parametro el nombre es mundo
Route::get('/saludo/{nombre?}', function($nombre = "Mundo"){
    echo "Hola $nombre.";
});

Route::get('/studies', [StudyController::class, "index"]);

Route::get('/studies/create', [StudyController::class, "create"]);

Route::get('/studies/{id}', [StudyController::class, "show"]);

Route::get('/studies/{id}/edit', [StudyController::class, "edit"]);


