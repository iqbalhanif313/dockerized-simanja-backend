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
        //"id","st_desa_id","nama","alamat"
        // 1,1,"Keputih",NULL
        // 2,1,"Praja",NULL
        // 3,2,"Nginden Utara",NULL
        // 4,2,"Nginden Timur",NULL
        // 5,2,"Nginden Selatan",NULL
        // 6,4,"Ngagel Rejo",NULL
        // 7,4,"Ngagel Mulyo",NULL
        // 8,4,"Bratang",NULL
        // 9,1,"Semampir",NULL
        // 10,3,"Krukah",NULL
        // 11,3,"Gubeng",NULL
        DB::table('st_kelompok')->insert([
            [
                "id" => 1,
                "nama" => "Keputih",
                "alamat" => NULL,
                "st_desa_id" => 1
            ],
            [
                "id" => 2,
                "nama" => "Praja",
                "alamat" => NULL,
                "st_desa_id" => 1
            ]
        ]);
    }
}
