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
                "titulo"   => $faker->word,
                "categoria" => $this->cargar_Categoria_random($faker->numberBetween(0,4)),
                "imagen"    => $faker->md5,
                "preparacion" => $faker->text,
                "fk_autor"      => $faker->numberBetween(1,10)
            ]);
        endfor;
    }

    /**
     * @param Faker
     * @return mixed
     */
    private function cargar_Categoria_random($numero_random){
        $array = ['Carnes','Pollos','Pastas','Pescados','Postres'];

        return $array[$numero_random];
    }
}
