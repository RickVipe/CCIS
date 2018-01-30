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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('coordinadores')->group(function(){
	Route::resource('alumnos', 'AlumnoController');
	Route::resource('coordinadores', 'CoordinadorController');
	Route::resource('docentes', 'DocenteController');
	Route::resource('asignaturas','AsignaturaController');
	Route::resource('grados','GradoController');
	Route::resource('fecha_ingreso','Fecha_IngresoController');
});


Route::prefix('coordinadores')->group(function() {
  Route::get('/login', 'Auth\CoordinadorLoginController@showLoginForm')->name('coordinador.login');
  Route::post('/login', 'Auth\CoordinadorLoginController@Login')->name('coordinador.login.submit');
});

Route::prefix('alumnos')->group(function() {
  Route::get('/login', 'Auth\AlumnoLoginController@showLoginForm')->name('alumno.login');
  Route::post('/login', 'Auth\AlumnoLoginController@Login')->name('alumno.login.submit');
});

Route::prefix('docentes')->group(function() {
  Route::get('/login', 'Auth\DocenteLoginController@showLoginForm')->name('docente.login');
  Route::post('/login', 'Auth\DocenteLoginController@Login')->name('docente.login.submit');
});


// opciones docente
//Route::get('docentes/perfil','DocenteController@verPerfil');
//Route::get('docentes/miscursos','DocenteController@verCursos');
//Route::get('docentes/cursos','DocenteController@verCursosNotas');
//Route::get('docentes/cursos/notasAlumnos','DocenteController@verAlumnosNotas');
//Route::resource('docentes', 'DocenteController');
//


#Route::get('alumnos/info', 'AlumnoController@info');






//Route::get('/docentes', 'HomeController@index')->name('home');
//Route::get('/alumnos', 'HomeController@index')->name('home');
//Route::get('/coordinadores', 'HomeController@index')->name('home');
