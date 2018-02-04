<?php

use Illuminate\Database\Seeder;
use App\Alumno;
class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Alumno::class, 30)->create();
    }
}
