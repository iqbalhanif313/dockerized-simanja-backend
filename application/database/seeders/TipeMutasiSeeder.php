<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeMutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_tipe_mutasi')->insert([
            [
                "id" => "IN",
                "nama" => "Masuk"
            ],
            [
                "id" => "OUT",
                "nama" => "Keluar"
            ]
        ]);
    }
}
