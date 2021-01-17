<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TransJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trans_jadwal')->insert([
            [
                "id" => "bdc44a75-993b-48f9-9896-efca1566e277",
                "tanggal" => "2020-12-21",
                "jam_mulai" => "19:30:00",
                "jam_selesai" => "21:00:00",
                "md_kegiatan_id" => "0d85a5a1-b969-4d0a-978a-cb000ae9a438"    
            ]
        ]);
    }
}
