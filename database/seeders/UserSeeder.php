<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
           /* [
            'name'=>'traiteur1',
            'email'=>'traiteur1@traiteur.com',
            'password'=>Hash::make('12345'),
            'role'=>'user'
        ],*/
        [
        'name'=>'ad',
        'email'=>'ad@ad.com',
        'password'=>Hash::make('admin'),
        'role'=>'admin'
    ]
    );
    }
}
