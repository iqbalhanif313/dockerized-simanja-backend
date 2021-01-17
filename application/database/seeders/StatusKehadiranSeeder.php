<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_status_kehadiran')->insert([
            [
                "id" => "H",
                "nama" => "Hadir"
            ],
            [
                "id" => "I",
                "nama" => "Izin"
            ]
        ]);
    }
}
