<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransPresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trans_presensi')->insert([
            [
                "id" => "eb41ff4d-16d1-4ed3-a97f-977545fa5168",
                "trans_jadwal_id" => "bdc44a75-993b-48f9-9896-efca1566e277",
                "md_jamaah_nik" => "9998887776665554",
                "st_status_kehadiran_id" => "H",
                "jam_kehadiran" => "19:22:00"
            ]
        ]);
    }
}
