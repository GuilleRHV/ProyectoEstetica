<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppEjemplos;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudyController;

use App\Http\Controllers\PruebaController;
use Illuminate\Database\Console\PruneCommand;

use App\Http\Controllers\AppEjemplo;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EsteticaController;
use App\Http\Controllers\SocioTratamientoController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\TratamientoController;
use App\Models\SocioTratamiento;

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


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/', function () {
    return view('welcome');
});



Route::resource('products', ProductController::class);

Route::resource('clients', ClientController::class);

Route::resource('users', UserController::class);


// SOCIOS
Route::get('/esteticas/showsocio/{id}',[SocioController::class,'show'])->name('socio.show');
Route::get('/esteticas/createsocio',[SocioController::class,'create'])->name('socio.create');
Route::post('/esteticas/storesocio',[SocioController::class,'store'])->name('socio.store');
Route::get('/esteticas/editsocio/{id}',[SocioController::class,'edit'])->name('socio.edit');
Route::put('/esteticas/updatesocio/{id}',[SocioController::class,'update'])->name('socio.update');
Route::delete('/esteticas/deletesocio/{id}',[SocioController::class,'destroy'])->name('socio.destroy');

//ADMIN
Route::get('/esteticas/showadmin/{id}',[AdminController::class,'show'])->name('admin.show');
Route::get('/esteticas/createadmin',[AdminController::class,'create'])->name('admin.create');
Route::post('/esteticas/storeadmin',[AdminController::class,'store'])->name('admin.store');
Route::get('/esteticas/editadmin/{id}',[AdminController::class,'edit'])->name('admin.edit');
Route::put('/esteticas/updateadmin/{id}',[AdminController::class,'update'])->name('admin.update');
Route::delete('/esteticas/deleteadmin/{id}',[AdminController::class,'destroy'])->name('admin.destroy');


//TRATAMIENTOS
Route::get('/esteticas/dartratamiento/{id}',[TratamientoController::class,'dartratamiento'])->name('tratamiento.dartratamiento');
Route::get('/esteticas/createtratamiento',[TratamientoController::class,'create'])->name('tratamiento.create');
Route::post('/esteticas/storetratamiento',[TratamientoController::class,'store'])->name('tratamiento.store');
Route::post('/esteticas/storesociotratamiento',[SocioTratamientoController::class,'store'])->name('sociotratamiento.store');
Route::delete('/esteticas/deletesociotratamiento/{fecha}/{socio_id}',[SocioTratamientoController::class,'destroy'])->name('sociotratamiento.destroy');


//ESTETICAS (INDEX)
Route::get('/esteticas/credenciales',[EsteticaController::class,'credenciales'])->name('esteticas.credenciales');
Route::resource('esteticas', EsteticaController::class);


/*EJERCICIO VIDEOCLUB*/

/*
Route::get('/',[HomeController::class,'gethome']);
Route::get('/catalog',[CatalogController::class,'getIndex']);
Route::get('/catalog/create',[CatalogController::class,'getCreate']);
Route::get('/catalog/{id}/edit',[CatalogController::class,'getEdit']);
*/

//Route::get('/',[CatalogController::class,'home']);

//Route::resource('/', CatalogController::class);





/*
Route::get('/videoclub',[VideoclubController::class,'index']);
Route::get('/videoclub/login',[VideoclubController::class,'login']);
Route::get('/videoclub/create',[VideoclubController::class,'create']);
Route::post('/videoclub',[VideoclubController::class,'store']);
*/


Route::get('/hola', function () {
    echo "Hola mundo.";
    $arr = [1, 2, 3, "hola"];
    //dd($_SERVER);
    // dd($arr);
    //Return devuelve en json
    return $_SERVER;
    dd($_SERVER);
});

Route::get('/hola/{nombre}', function ($nombre) {
    echo "Hola $nombre.";
});
//Si no me llega parametro el nombre es mundo
Route::get('/saludo/{nombre?}', function ($nombre = "Mundo") {
    echo "Hola $nombre.";
});
/*
Route::get('/studies', [StudyController::class, "index"]);

Route::get('/studies/create', [StudyController::class, "create"]);

Route::get('/studies/{id}', [StudyController::class, "show"]);

Route::get('/studies/{id}/edit', [StudyController::class, "edit"]);

Route::delete('/studies/{id}/destroy', [StudyController::class, "destroy"]);

Route::put('/studies/{id}', [StudyController::class, "uptade"]);

Route::post('/studies', [StudyController::class, "store"]);

*/

Route::get('/studies/{id}', function ($id) {
    echo "Show del id " . $id;
    //}) -> where ("id","[0-9]+");
})->where("id", "[0-9]+[a-zA-Z]+");



Route::get('/prueba2/{name}', [PruebaController::class, "saludoCompleto"]);
//Route::resource('/studies', [StudyController::class]);

//RUTAS CON NOMBRE
Route::get('/contacta-con-ies', function () {
    return "dinos tu duda";
})->name("contacto");

/*Route::get('/',function(){
    echo "<a href='".route("contacto")."'>Contactar 1</a><br>";
    echo "<a href='contacta-con-ies'>Contactar 2</a><br>";
    echo "<a href='contacta-con-ies'>Contactar 3</a><br>";

});*/

//---------------------------------------------
Route::get('/informacion-asignatura', [AppEjemplo::class, 'mostrarinformacion'])->name("infoasig");

/*Route::get('/', function () {
    echo "<a href='" . route("infoasig") . "'>Mostrar informacion Asignatura</a><br>";
});
*/
/******************************************** */
Route::resource('/asignaturas', AsignaturaController::class);
//Es lo mismo que 
/* Route::get('/asignaturas/create', [AsignaturaController::class,'create']);
        Route::post('/asignaturas', [AsignaturaController::class,'store']);
        Route::put('/asignaturas', [AsignaturaController::class,'update']);
        ...
    */


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*EJERCICIO VIDEOCLUB*/

//Route::get('/',[VideoclubController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
