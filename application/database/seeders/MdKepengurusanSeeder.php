<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MdKepengurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('md_kepengurusan')->insert([
            [
                "id" => "KUDRH",
                "nama" => "KU Daerah",
                "st_kepengurusan_id" => "4S",
                "st_level_id" => "DRH",   
            ]
        ]);
    }
}
