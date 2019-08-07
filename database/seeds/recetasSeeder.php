<?php

use App\Models\Receta;
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

        for($i = 1; $i <= 50; $i++):
            $receta = new Receta([
                'titulo' => $faker->streetName,
                'preparacion' => $faker->text,
                'fk_autor' => $faker->numberBetween(1,10),
                'categoria' => $this->cargar_Categoria_random($faker->numberBetween(0,4)),
                'dificultad' => $faker->randomElement(['Muy Facil','Facil','Moderado','Difici','Master Cheft']),
                'tiempo_preparacion' => $faker->randomElement(['30','45','60','90','120']),
            ]);
            $receta->save();
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
