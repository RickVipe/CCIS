<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AlumnosTableSeeder::class);
        $this->call(CoordinadorsTableSeeder::class);
        $this->call(AsignaturaTableSeeder::class);
        $this->call(DocentesTableSeeder::class);
        $this->call(GradosTableSeeder::class);
    }
}
