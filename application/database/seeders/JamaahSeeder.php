<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JamaahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('md_jamaah')->insert([
            [
                'nik' => 9998887776665554,
                'nama' => "UsErS",
                'jenis_kelamin' => "L",
                'tempat_lahir' => "surabaya",
                'tanggal_lahir'  => "1999-12-30",
                'hp'    => "08123456789",
                'alamat' => "Jalan-jalan ke binaria",
                'users_id' => 1,
                'md_kelompok_id' => "NTM",
                'st_kategori_jamaah_id' => "D",
                'st_status_jamaah_id' => "P",
                'st_provinsi_id' => "11",
                'st_kab_id' => "1101",
                'st_kec_id' => "1101010",
                'st_kel_id' => "1101010001"
            ]
        ]);
    }
}
