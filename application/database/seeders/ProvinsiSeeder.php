<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_provinsi')->insert([
            [
                "id" => 1,
                "nama" => "Jawa Timur"
            ],
            [
                "id" => 2,
                "nama" => "Madura"
            ]
        ]);
    }
}
