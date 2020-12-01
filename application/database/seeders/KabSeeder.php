<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kab')->insert([
            [
                "id" => 1,
                "nama" => "Surabaya",
                "provinsi_id" => 1
            ]
        ]);
    }
}
