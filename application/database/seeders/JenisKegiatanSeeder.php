<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKegiatanSeeder extends Seeder
{
    public function run(){
        DB::table('st_jenis_kegiatan')->insert([
            [
                'id' => 1,
                'nama'=>'Desa',
            ],
            [
                'id' => 2,
                'nama'=>'Kelompok',
            ],
        ]);
    }

}
