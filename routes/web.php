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

// Usuarios REST
Route::get('usuario', 'UserController@index')->name('user.index'); 
Route::post('usuario', 'UserController@store')->name('user.store'); 
Route::get('usuario/crear', 'UserController@create')->name('user.create');
Route::get('usuario/{id}', 'UserController@show')->name('user.show');
Route::patch('usuario/{id}', 'UserController@update')->name('user.update');
Route::delete('usuario/{id}', 'UserController@destroy')->name('user.destroy'); 
Route::get('usuario/{id}/editar', 'UserController@edit')->name('user.edit');

// Peliculas REST
Route::get('pelicula', 'MovieController@index')->name('movie.index'); 
Route::post('pelicula', 'MovieController@store')->name('movie.store'); 
Route::get('pelicula/crear', 'MovieController@create')->name('movie.create');
Route::get('pelicula/{id}', 'MovieController@show')->name('movie.show');
Route::patch('pelicula/{id}', 'MovieController@update')->name('movie.update');
Route::delete('pelicula/{id}', 'MovieController@destroy')->name('movie.destroy'); 
Route::get('pelicula/{id}/editar', 'MovieController@edit')->name('movie.edit'); 

// Generos REST
Route::get('genero', 'GenderController@index')->name('gender.index'); 
Route::post('genero', 'GenderController@store')->name('gender.store'); 
Route::get('genero/crear', 'GenderController@create')->name('gender.create');
Route::get('genero/{id}', 'GenderController@show')->name('gender.show');
Route::patch('genero/{id}', 'GenderController@update')->name('gender.update');
Route::delete('genero/{id}', 'GenderController@destroy')->name('gender.destroy'); 
Route::get('genero/{id}/editar', 'GenderController@edit')->name('gender.edit');