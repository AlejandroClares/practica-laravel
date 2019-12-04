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
    return redirect()->route('movie.index');
});

// Usuarios REST
Route::get('user/login', 'UserController@logout')->name('user.closeSession');
Route::resource('user', 'UserController');

// Peliculas REST
Route::get('movie/delete/{id}', 'MovieController@destroy')->name('movie.delete');
Route::get('movie/search/{id}', 'MovieController@search')->name('movie.search');
Route::get('movie/searchYear/{id}', 'MovieController@searchYear')->name('movie.searchYear');
Route::get('movie/searchDirector/{id}', 'MovieController@searchDirector')->name('movie.searchDirector');
Route::get('movie/searchActor/{id}', 'MovieController@searchActor')->name('movie.searchActor');
Route::get('movie/searchGender/{id}', 'MovieController@searchGender')->name('movie.searchGender');

Route::resource('movie', 'MovieController');

// Generos REST
Route::get('gender/modalForm', 'GenderController@modalForm')->name('gender.modalForm');
Route::post('gender/modalForm/store', 'GenderController@modalFormStore')->name('gender.modalFormStore');
Route::resource('gender', 'GenderController');

// Personas REST
Route::get('person/modalForm', 'PersonController@modalForm')->name('person.modalForm');
Route::post('person/modalForm/store', 'PersonController@modalFormStore')->name('person.modalFormStore');
Route::resource('person', 'PersonController');

// Rutas de login
Auth::routes(['register' => false]);
// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
