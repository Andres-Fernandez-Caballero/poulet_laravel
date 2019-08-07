<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Autor;

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

            $autor = new Autor([
                'nombre' => $faker->name,
                'apellido' => $faker->lastName,
                'biografia' => $faker->text,
             ]);
            $autor->save();
        endfor;
    }
}
