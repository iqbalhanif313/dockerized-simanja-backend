<?php


namespace App\Http\Services\MdJamaah;

use App\Models\Jamaah;
use App\Models\Kab;
use App\Models\KategoriJamaah;
use App\Models\Kec;
use App\Models\Kel;
use App\Models\Kelompok;
use App\Models\Provinsi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class JamaahService
{

    public function handleJamaahCreation($request) {
        $credential = $request->only('nama','nik','jenis_kelamin','tempat_lahir','tanggal_lahir','hp','alamat','users_id','kelompok'
                ,'kategori_jamaah','status_jamaah','provinsi','kab','kec','kel');

        $users_id = User::where('id', $credential['users_id'])->first();
        if(!$users_id){
            return false;
        }

        $st_kelompok = Kelompok::where('id', $credential['kelompok'])->first();
        if(!$st_kelompok){
            return false;
        }

        $st_kategori_jamaah = KategoriJamaah::where('id', $credential['kategori_jamaah'])->first();
        if(!$st_kategori_jamaah){
            return false;
        }

        $st_status_jamaah = Status::where('id', $credential['status_jamaah'])->first();
        if(!$st_status_jamaah){
            return false;
        }

        $provinsi = Provinsi::where('id', $credential['provinsi'])->first();
        if(!$provinsi){
            return false;
        }

        $kab = Kab::where('id', $credential['kab'])->first();
        if(!$kab){
            return false;
        }

        $kec = Kec::where('id', $credential['kec'])->first();
        if(!$kec){
            return false;
        }

        $kel = Kel::where('id', $credential['kel'])->first();
        if(!$kel){
            return false;
        }

        try {
            DB::transaction(function()use($credential) {
                $jamaah = new Jamaah();
                $jamaah->nama = $credential['nama'];
                $jamaah->nik = $credential['nik'];
                $jamaah->jenis_kelamin = $credential['jenis_kelamin'];
                $jamaah->tempat_lahir = $credential['tempat_lahir'];
                $jamaah->tanggal_lahir = $credential['tanggal_lahir'];
                $jamaah->hp = $credential['hp'];
                $jamaah->alamat = $credential['alamat'];
                $jamaah->users_id = $credential['kelompok'];
                $jamaah->st_kelompok_id = $credential['kelompok'];
                $jamaah->st_kategori_jamaah_id = $credential['kategori_jamaah'];
                $jamaah->st_status_jamaah_id = $credential['status_jamaah'];
                $jamaah->provinsi_id = $credential['provinsi'];
                $jamaah->kab_id = $credential['kab'];
                $jamaah->kec_id = $credential['kec'];
                $jamaah->kel_id = $credential['kel'];
                $jamaah->save();

            });
        } catch (\Exception $e) {
            throw ($e);
            return false;
        }
        return true;
    }

}
