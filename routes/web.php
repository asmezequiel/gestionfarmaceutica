<?php

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
})->name('inicio');

Route::post('login' , 'Auth\LoginController@login')->name('login')->middleware('guest' , 'check.ajax');

Route::post('checkUser' , 'Auth\LoginController@checkedUser')->middleware('check.ajax');

Route::post('logout' , 'Auth\LoginController@logout')->name('logout')->middleware('auth' , 'check.ajax');



Route::group(['prefix' => 'administracion' , 'middleware' => [/*'auth' , 'check.ajax'*/]], function () {
	
	Route::resource('medicamentos', 'MedicamentosController')->names([
	    'index' 	=> 'show.all.medicamento',
	    'create' 	=> 'create.medicamento',
	    'show'  	=> 'show.medicamento',
	    'destroy' 	=> 'deshabilitar.medicamento' 
	]);
	/*define('MEDICAMENTOS' 	, 'MedicamentosController@'); 	// MEDICAMENTOS = nombre del controlador de medicamentos
	define('MOVIMIENTOS' 	, 'MovimientosController@'); 	// MOVIMIENTOS = nombre del controlador de movimientos
	define('USUARIOS' 		, 'UsuariosController@'); 		// USUARIOS = nombre del controlador de usuarios

    Route::get('/', MEDICAMENTOS . 'index')->name('index');

    Route::prefix('medicamento')->group(function () { //funciones que afectan a los medicamentos.
	    Route::post('crear' 			, MEDICAMENTOS . 'crearNuevoMedicamento')	->name('crear.medicamento');
	    Route::post('actualizar' 		, MEDICAMENTOS . 'actualizarMedicamento')	->name('actualizar.medicamento');
	    Route::post('show' 				, MEDICAMENTOS . 'getMedicamento') 			->name('get.medicamento');
	    Route::post('mostrar_todo' 		, MEDICAMENTOS . 'getAllMedicamentos') 		->name('get.all.medicamentos');
	});

	Route::prefix('movimientos')->group(function(){
	    Route::post('dar_alta' 		, MEDICAMENTOS . 'altaMedicamento')		->name('alta.medicamento');
	    Route::post('dar_baja' 		, MEDICAMENTOS . 'bajaMedicamento') 	->name('baja.medicamento');
	});

	Route::prefix('usuarios')->group(function(){
	    Route::post('crear' 		, USUARIOS . 'createNewUser')	->name('crear.usuario');
	    Route::post('actualizar' 	, USUARIOS . 'updateUser')		->name('actualizar.usuario');
	    Route::post('dar_baja' 		, USUARIOS . 'deleteUser')		->name('dar.baja.usuario');
	    Route::post('mostrar' 		, USUARIOS . 'showUser')		->name('mostrar.usuario');	    
	    Route::post('mostrar_todo' 	, USUARIOS . 'showAllUsers')	->name('mostrar.todos.usuarios');
	});

	Route::prefix('permisos')->group(function(){
	    Route::post('dar' 		, USUARIOS . 'darPermisos')			->name('dar.permisos.usuario');
	    Route::post('remover' 	, USUARIOS . 'removerPermisos')		->name('remover.permisos.usuario');
	});*/
});
