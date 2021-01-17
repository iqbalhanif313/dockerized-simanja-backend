<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusJamaahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_status_jamaah')->insert([
            [
                "id" => "P",
                "nama" => "Pengurus"
            ],
            [
                "id" => "R",
                "nama" => "Royah"
            ]
        ]);
    }
}
