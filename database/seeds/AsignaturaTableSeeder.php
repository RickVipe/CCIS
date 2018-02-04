<?php

use Illuminate\Database\Seeder;
use App\Asignatura;
class AsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Asignatura::class, 20)->create();
    }
}
