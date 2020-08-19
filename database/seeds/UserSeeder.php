<?php

use Illuminate\Database\Seeder;
//Hash pour crypter le mot de passe
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@encyclopedie.com',
        'password' => Hash::make('root'),
        'admin' => 1,
        ]);

        //Insertion d'un utilisateur non-admin
        DB::table('users')->insert([
            'name' => 'lambda',
            'email' => 'lambda@encyclopedie.com',
            'password' => Hash::make('lambda'),
            'admin' => 0,
            ]);
    }
}
