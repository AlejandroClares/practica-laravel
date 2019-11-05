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
});

Route::get('usuario', 'UserController@index')->name('user.index'); 
Route::post('usuario', 'UserController@store')->name('user.store'); 
Route::get('usuario/crear', 'UserController@create')->name('user.create');
Route::get('usuario/{id}', 'UserController@show')->name('user.show');
Route::patch('usuario/{id}', 'UserController@update')->name('user.update');
Route::delete('usuario/{id}', 'UserController@destroy')->name('user.destroy'); 
Route::get('usuario/{id}/editar', 'UserController@edit')->name('user.edit');