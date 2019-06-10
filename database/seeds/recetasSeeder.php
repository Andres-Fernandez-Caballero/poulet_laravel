<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class recetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i <= 100; $i++):
            DB::table("recetas")->insert([
                "id_recetas"       => $i,
                "titulo"   => $faker->title,
                "categoria" => 'carnes',
                "imagen"    => $faker->md5,
                "preparacion" => $faker->text,
                "fk_autor"      => $faker->numberBetween(1,10)
            ]);
        endfor;
    }
}
