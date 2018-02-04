<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Alumno::class, function (Faker\Generator $faker) {
    return [
    	'id' => $faker->unique()->randomNumber($nbDigits = 8),
        'nombres' => $faker->name,
        'apellidos' => $faker->name,
        'fecha_nacimiento'=>$faker->date,
        'direccion' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'apoderado' => $faker->name,
        'telefono' => $faker->phoneNumber,
    ];
});

$factory->define(App\Coordinador::class, function (Faker\Generator $faker) {
    return [
    	'id' => $faker->unique()->randomNumber($nbDigits = 8),
        'nombres' => $faker->name,
        'apellidos' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
    ];
});

$factory->define(App\Asignatura::class, function (Faker\Generator $faker) {
    return [
    	'id' => str_random(3),
        'nombre' => $faker->unique()->name,
    ];
});

$factory->define(App\Docente::class, function (Faker\Generator $faker) {
    return [
    	'id' => $faker->unique()->randomNumber($nbDigits = 8),
        'nombres' => $faker->name,
        'apellidos' => $faker->name,
        'especialidad' => 'Profesion',
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'telefono' => $faker->phoneNumber,
    ];
});

$factory->define(App\Grado::class, function (Faker\Generator $faker) {
    return [
    	'id' => $faker->unique()->randomNumber($nbDigits = 8),
        'nro' => $faker->numberBetween(1,5),
        'seccion'=> str_random(1),
        'nivel'=> $faker->randomElements($array=array('Primaria','Secundaria'))[0],
        'anio_academico' => '2018',
        'vacantes' => 20,
    ];
});