<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKegiatanSeeder extends Seeder
{
    public function run(){
        DB::table('st_jenis_kegiatan')->insert([
            [
                'id' => "P",
                'nama'=>"Pengajian",
            ],
            [
                'id' => "M",
                'nama'=>"Musyawaroh",
            ],
        ]);
    }

}
