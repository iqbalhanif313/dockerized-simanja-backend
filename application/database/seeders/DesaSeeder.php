<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_desa')->insert([
            [
                "id" => "SPR",
                "nama" => "Semampir"
            ],
            [
                "id" => "NGD",
                "nama" => "Nginden"
            ],
            [
                "id" => "KRK",
                "nama" => "Krukah"
            ]
        ]);
    }
}
