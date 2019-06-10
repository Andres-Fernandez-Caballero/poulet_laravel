<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class autoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i <= 10; $i++):
            DB::table("autores")->insert([
                "id_autor"       => $i,
                "nombre"   => $faker->name,
                "apellido" => $faker->lastName,
                "biografia"    => $faker->text
            ]);
        endfor;
    }
}
