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
        //"id","nama"
        // 1,"Semampir"
        // 2,"Nginden"
        // 3,"Krukah"
        // 4,"Ngagel"
        DB::table('st_desa')->insert([
            [
                "id" => 1,
                "nama" => "Semampir"
            ],
            [
                "id" => 2,
                "nama" => "Nginden"
            ]
        ]);
    }
}
