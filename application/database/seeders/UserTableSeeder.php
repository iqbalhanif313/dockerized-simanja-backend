<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(){
        DB::table('user')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }

}
