<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kec')->insert([
            [
                "id" => 1,
                "nama" => "Sukolilo",
                "kab_id" => 1
            ]
        ]);
    }
}
