<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(StKepengurusanSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(KelompokSeeder::class);
        $this->call(KategoriJamaahSeeder::class);
        $this->call(StatusJamaahSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(KabSeeder::class);
        $this->call(KecSeeder::class);
        $this->call(KelSeeder::class);
        $this->call(JenisKegiatanSeeder::class);
        $this->call(StatusKehadiranSeeder::class);
        $this->call(TipeMutasiSeeder::class);
        $this->call(MdKegiatanSeeder::class);
        $this->call(JamaahSeeder::class);
        $this->call(MdKepengurusanSeeder::class);
        $this->call(TransJadwalSeeder::class);
        $this->call(TransKepengurusanSeeder::class);
        $this->call(TransPresensiSeeder::class);
    }
}
