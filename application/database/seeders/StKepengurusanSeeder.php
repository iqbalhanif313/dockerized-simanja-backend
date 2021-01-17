<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StKepengurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_kepengurusan')->insert([
            [
                'id' => "4S",
                'nama'=>'4S',
            ],
            [
                'id' => "T7",
                'nama'=>'Tim 7',
            ],
            [
                'id' => "MM",
                'nama'=>'Muda-mudi',
            ],
            [
                'id' => "SK",
                'nama'=>'Senkom',
            ],
        ]);
    }
}
