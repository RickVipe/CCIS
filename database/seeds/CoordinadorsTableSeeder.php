<?php

use Illuminate\Database\Seeder;
use App\Coordinador;
class CoordinadorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Coordinador::class, 10)->create();
    }
}
