<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('md_kelompok')->insert([
            [
                "id" => "KRK",
                "nama" => "Krukah",
                "alamat" => NULL,
                "st_desa_id" => "KRK"
            ],
            [
                "id" => "NTM",
                "nama" => "Nginden Timur",
                "alamat" => NULL,
                "st_desa_id" => "NGD"
            ]
        ]);
    }
}
