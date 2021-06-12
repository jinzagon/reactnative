<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'id' => '1',
            'civilité' => 'Mr',            
            'nom' => 'Yazid',
            'prénom' => 'Talbi',
            'email' => 'yazid@hotmail.com',
            'photo' => '',
            'ville' => 'Meknes',
            'adresse' => 'Tachfine',
            'password' => bcrypt('123456789'),
        ]);
        DB::table('users')->insert([
            'id' => '2',
            'civilité' => 'Mme',            
            'nom' => 'Christelle',
            'prénom' => 'Simard',
            'email' => 'simard@hotmail.com',
            'photo' => '',
            'ville' => 'Paris',
            'adresse' => 'Paris',
            'password' => bcrypt('123456789'),
        ]);
    }
}
