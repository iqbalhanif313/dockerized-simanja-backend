<?php

namespace App\Repositories;

use App\Models\Jamaah;
use DB;

class JamaahRepository
{
    /**
     * @var Jamaah
     */
    protected $model;

    public function __construct(Jamaah $jamaah)
    {
        $this->model = $jamaah;
    }

    public function getAll()
    {
        // $query =
        //     "SELECT md_jamaah.*,u.*,sk.nama as kecamatan, s.nama as kelurahan,k.nama as kabupaten,sp.nama as provinsi,ssj.nama as status,skj.nama as kategori,mk.nama as kelompok from md_jamaah
        //         LEFT JOIN st_kec sk on md_jamaah.st_kec_id = sk.id
        //         LEFT JOIN st_kel s on md_jamaah.st_kel_id = s.id
        //         LEFT JOIN st_kab k on md_jamaah.st_kab_id = k.id
        //         LEFT JOIN st_provinsi sp on k.st_provinsi_id = sp.id
        //         LEFT JOIN st_status_jamaah ssj on md_jamaah.st_status_jamaah_id = ssj.id
        //         LEFT JOIN st_kategori_jamaah skj on md_jamaah.st_kategori_jamaah_id = skj.id
        //         LEFT JOIN md_kelompok mk on md_jamaah.md_kelompok_id = mk.id
        //         LEFT JOIN users u on md_jamaah.users_id = u.id
        //         WHERE md_jamaah.deleted_at IS NULL";
        // $data = DB::select($query);
        // return response()->json($data);
        // $data = Jamaah::all();
        $response = [];
        $datas = Jamaah::all();
        foreach ($datas as $data){
            $response[] = [
                "nik" => $data->nik,
                "nama" => $data->nama,
                "jenis_kelamin" => $data->jenis_kelamin,
                "tempat_lahir" => $data->tempat_lahir,
                "tanggal_lahir" => $data->tanggal_lahir,
                "hp" => $data->hp,
                "alamat" => $data->alamat,
                "provinsi" => $data->provinsi->nama,
                "kabupaten" => $data->kabupaten->nama,
                "kecamatan" => $data->kecamatan->nama,
                "kelurahan" => $data->kelurahan->nama,
                "kelompok" => $data->kelompok->nama,
                "kategori" => $data->kategori_jamaah->nama,
                "status" => $data->status_jamaah->nama,
            ];
        }
        return $response;
    }

    public function getRef() {
        return $this->model->newQuery()
            ->selectRaw("nik as id, concat(nik, ' - ', nama) as text")
            ->whereNull('deleted_at')
            ->get();
    }

    public function getById($id)
    {
        $query =
            "SELECT md_jamaah.*,u.*,sk.nama as kecamatan, s.nama as kelurahan,k.nama as kabupaten,sp.nama as provinsi,ssj.nama as status,skj.nama as kategori,mk.nama as kelompok from md_jamaah
                LEFT JOIN st_kec sk on md_jamaah.st_kec_id = sk.id
                LEFT JOIN st_kel s on md_jamaah.st_kel_id = s.id
                LEFT JOIN st_kab k on md_jamaah.st_kab_id = k.id
                LEFT JOIN st_provinsi sp on k.st_provinsi_id = sp.id
                LEFT JOIN st_status_jamaah ssj on md_jamaah.st_status_jamaah_id = ssj.id
                LEFT JOIN st_kategori_jamaah skj on md_jamaah.st_kategori_jamaah_id = skj.id
                LEFT JOIN md_kelompok mk on md_jamaah.md_kelompok_id = mk.id
                LEFT JOIN users u on md_jamaah.users_id = u.id
                WHERE md_jamaah.nik ='$id'
                AND md_jamaah.deleted_at IS NULL";
        $data = DB::select($query);
        return response()->json($data);
    }


}
