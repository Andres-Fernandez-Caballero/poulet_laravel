<?php

use Illuminate\Database\Seeder;
use App\User;

class UserMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'email' => 'andres.fernandezcaballero@davinci.edu.ar',
            'password' => bcrypt(1234),
            'name' => 'Andres',
            'rol' => 'master'
        ]);
        $user->save();
    }
}
