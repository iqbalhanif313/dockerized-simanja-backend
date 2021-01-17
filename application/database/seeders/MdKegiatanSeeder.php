<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MdKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('md_kegiatan')->insert([
            [
                "id" => "0d85a5a1-b969-4d0a-978a-cb000ae9a438",
                "deskripsi" => "Pengajian Muda-Mudi Daerah",
                "st_level_id" => "DRH",
                "st_jenis_kegiatan_id" => "P",
                "st_kategori_jamaah_id" => "R"    
            ]
        ]);
    }
}
