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


Route::prefix('menucoordinadores')->group(function(){
  Route::resource('alumnos', 'AlumnoController');
	Route::resource('coordinadores', 'CoordinadorController');
	Route::resource('docentes', 'DocenteController');
	Route::resource('asignaturas','AsignaturaController');
	Route::resource('grados','GradoController');
	Route::resource('fecha_ingreso','Fecha_IngresoController');
  Route::resource('cursos','CursoController');

  Route::get('salon_horario', 'Salon_HorarioController@store');
  Route::get('salon_horario/horario/{id}', 'Salon_HorarioController@nuevo');

  Route::resource('salon_horario','Salon_HorarioController');
  Route::resource('matriculas','MatriculaController');

  Route::post('/reportes/listado','ReporteController@listado');
  Route::resource('reportes','ReporteController');

  Route::post('/listadocentescurso/listado','ListaDocenteCursoController@listado');
  Route::resource('listadocentescurso','ListaDocenteCursoController');

  Route::post('constancias/listado','ConstanciaController@listado');
  Route::post('constancias/descargar','ConstanciaController@descargar');
  Route::resource('constancias','ConstanciaController');
});

Route::prefix('menualumnos')->group(function(){
  Route::get('/inicio', 'AlumnoMenuController@index')->name('menualumnos.index');
  Route::get('/perfil', 'AlumnoMenuController@info')->name('alumnosmenu.info');
  Route::get('/miscursos','AlumnoMenuController@fill_years');
  Route::post('/miscursos/lista','AlumnoMenuController@get_courses_by_year');
  Route::get('/horario','AlumnoMenuController@schedule');
  Route::get('/mis_docentes','AlumnoMenuController@my_teachers');
});

Route::prefix('menudocentes')->group(function(){
  Route::get('perfil','DocenteMenuController@verPerfil');
  Route::get('miscursos','DocenteMenuController@recuperarAnios');
  Route::post('miscursos/lista','DocenteMenuController@recuperarCursosxAnio');
  Route::get('horario','DocenteMenuController@verHorario');
  Route::get('periodo','DocenteMenuController@recuperarAniosNotas');
  Route::post('periodo/cursos','DocenteMenuController@recuperarCursosxAnioNotas');
  Route::get('periodo/cursos/{id_grado}/{id_asignatura}','DocenteMenuController@recuperarAlumnosxCurso');
  Route::get('periodo/cursos/{idgrado}/{idasignatura}/{idalumno}','NotaController@cargarDatosAlumno');
  Route::post('notas/{id_matricula}/{id_curso}/{id_alumno}','NotaController@registrarNota');
  Route::resource('notas', 'NotaController');
  #Route::get('docentes', 'DocenteMenuController@index')->name('menudocentes.index');
  Route::resource('docentes', 'DocenteMenuController'); //123/
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


#Route::get('alumnos/info', 'AlumnoController@info');






//Route::get('/docentes', 'HomeController@index')->name('home');
//Route::get('/alumnos', 'HomeController@index')->name('home');
//Route::get('/coordinadores', 'HomeController@index')->name('home');
