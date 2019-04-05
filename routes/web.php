<?php
//URL::forceScheme('https'); //esto para heroku
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
	    'create' 	=> 'medicamento.create',
	    'store' 	=> 'medicamento.store',
	    'show'  	=> 'medicamento.show',
	    'destroy' 	=> 'medicamento.deshabilitar' 
	]);

	Route::resource('stock' , 'StockController')->names([
	    'store' 	=> 'stock.store',
	]);

	Route::resource('movimientos', 'MovimientosController')->names([
	    'index' 	=> 'show.all.movimientos',
	    'create' 	=> 'movimientos.create',
	    'show'  	=> 'movimientos.detalles.show',
	    'destroy' 	=> 'movimientos.deshabilitar' 
	]);
});
