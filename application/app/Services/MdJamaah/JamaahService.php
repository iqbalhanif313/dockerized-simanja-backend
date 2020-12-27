<?php


namespace App\Services\MdJamaah;

use App\Models\Jamaah;
use App\Models\Kab;
use App\Models\KategoriJamaah;
use App\Models\Kec;
use App\Models\Kel;
use App\Models\Kelompok;
use App\Models\Provinsi;
use App\Models\Status;
use App\Models\User;
use App\Repositories\JamaahRepository;
use Illuminate\Support\Facades\DB;

class JamaahService
{
    protected $jamaahRepository;

    public function __construct(JamaahRepository $jamaahRepository)
    {
        $this->jamaahRepository = $jamaahRepository;
    }
    public function getAll()
    {
        return $this->jamaahRepository->getAll()->original;
    }

    public function getById($id)
    {
        return $this->jamaahRepository->getById($id)->original;
    }
    public function handleJamaahCreation($request)
    {
        $credential = $request->only(
            'nik',
            'users_id',
            'nama',       
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'hp',
            'alamat',
            'st_provinsi_id',
            'st_kab_id',
            'st_kec_id',
            'st_kel_id',
            'md_kelompok_id',
            'st_kategori_jamaah_id',
            'st_status_jamaah_id'
            
        );

        $users_id = User::where('id', $credential['users_id'])->first();
        if (!$users_id) {
            return false;
        }

        $st_kelompok = Kelompok::where('id', $credential['md_kelompok_id'])->first();
        if (!$st_kelompok) {
            return false;
        }

        $st_kategori_jamaah = KategoriJamaah::where('id', $credential['st_kategori_jamaah_id'])->first();
        if (!$st_kategori_jamaah) {
            return false;
        }

        $st_status_jamaah = Status::where('id', $credential['st_status_jamaah_id'])->first();
        if (!$st_status_jamaah) {
            return false;
        }

        // $provinsi = Provinsi::where('id', $credential['st_provinsi_id'])->first();
        // if (!$provinsi) {
        //     return false;
        // }

        // $kab = Kab::where('id', $credential['st_kab_id'])->first();
        // if (!$kab) {
        //     return false;
        // }

        // $kec = Kec::where('id', $credential['kec'])->first();
        // if (!$kec) {
        //     return false;
        // }

        // $kel = Kel::where('id', $credential['st_kel_id'])->first();
        // if (!$kel) {
        //     return false;
        // }

        try {
            DB::transaction(function () use ($credential) {
                $jamaah = new Jamaah();
                $jamaah->nik = $credential['nik'];
                $jamaah->users_id = $credential['users_id'];
                $jamaah->nama = $credential['nama'];
                $jamaah->jenis_kelamin = $credential['jenis_kelamin'];
                $jamaah->tempat_lahir = $credential['tempat_lahir'];
                $jamaah->tanggal_lahir = $credential['tanggal_lahir'];
                $jamaah->hp = $credential['hp'];
                $jamaah->alamat = $credential['alamat'];
                $jamaah->st_provinsi_id = $credential['st_provinsi_id'];
                $jamaah->st_kab_id = $credential['st_kab_id'];
                $jamaah->st_kec_id = $credential['st_kec_id'];
                $jamaah->st_kel_id = $credential['st_kel_id'];
                $jamaah->md_kelompok_id = $credential['md_kelompok_id'];
                $jamaah->st_kategori_jamaah_id = $credential['st_kategori_jamaah_id'];
                $jamaah->st_status_jamaah_id = $credential['st_status_jamaah_id'];
                
                $jamaah->save();

            });
        } catch (\Exception $e) {
            throw ($e);
            return false;
        }
        return true;
    }
}
