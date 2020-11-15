<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    public function run(){
        DB::table('role')->insert([
            [
                'id' => 1,
                'name'=>'admin',
            ],
            [
                'id' => 2,
                'name'=>'user',
            ],
        ]);
    }

}
