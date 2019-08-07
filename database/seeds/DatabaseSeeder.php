<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserMasterSeeder::class);
        $this->call(autoresSeeder::class);
        $this->call(recetasSeeder::class);
    }
}
