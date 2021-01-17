<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_level')->insert([
            [
                "id" => "DRH",
                "nama" => "Daerah"
            ],
            [
                "id" => "DS",
                "nama" => "Desa"
            ],
            [
                "id" => "KLP",
                "nama" => "Kelompok"
            ]
        ]);
    }
}
