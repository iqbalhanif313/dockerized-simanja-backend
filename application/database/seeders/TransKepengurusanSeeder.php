<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransKepengurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trans_kepengurusan')->insert([
            [
                "id" => "5ec93be8-9225-4756-947d-696511f88ccf",
                "md_jamaah_nik" => "9998887776665554",
                "md_kepengurusan_id" => "KUDRH"
            ]
        ]);
    }
}
