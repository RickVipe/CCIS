<?php

use Illuminate\Database\Seeder;
use App\Docente;
class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Docente::class, 20)->create();
    }
}
