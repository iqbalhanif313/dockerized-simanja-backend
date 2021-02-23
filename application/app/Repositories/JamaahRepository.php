<?php

namespace App\Repositories;

use App\Models\Jamaah;

class JamaahRepository
{
    protected $model;

    public function __construct(Jamaah $jamaah)
    {
        $this->model = $jamaah;
    }

    public function getAll()
    {
        return $this->model->newQuery()
            ->selectRaw("
                md_jamaah.nik,
                md_jamaah.nama,
                md_jamaah.jenis_kelamin,
                md_jamaah.tempat_lahir,
                md_jamaah.tanggal_lahir,
                to_char(md_jamaah.tanggal_lahir, 'DD Mon YYYY') as f_tanggal_lahir,
                md_jamaah.hp,
                md_jamaah.users_id,
                case when u.email is null then '-' else u.email end as email,
                md_jamaah.alamat,
                md_jamaah.st_kel_id,
                case when sl.nama is null then '-' else sl.nama end as kelurahan,
                md_jamaah.st_kec_id,
                case when sc.nama is null then '-' else sc.nama end as kecamatan,
                md_jamaah.st_kab_id,
                case when sb.nama is null then '-' else sb.nama end as kabupaten,
                md_jamaah.st_provinsi_id,
                case when sp.nama is null then '-' else sp.nama end as provinsi,
                md_jamaah.md_kelompok_id,
                case when mk.nama is null then '-' else mk.nama end as kelompok,
                md_jamaah.st_kategori_jamaah_id,
                case when skj.nama is null then '-' else skj.nama end as kategori,
                md_jamaah.st_status_jamaah_id,
                case when ssj.nama is null then '-' else ssj.nama end as status
            ")
            ->leftJoin('user as u', 'md_jamaah.users_id', '=', 'u.id')
            ->leftJoin('st_kel as sl', 'md_jamaah.st_kel_id', '=', 'sl.id')
            ->leftJoin('st_kec as sc', 'md_jamaah.st_kec_id', '=', 'sc.id')
            ->leftJoin('st_kab as sb', 'md_jamaah.st_kab_id', '=', 'sb.id')
            ->leftJoin('st_provinsi as sp', 'md_jamaah.st_provinsi_id', '=', 'sp.id')
            ->leftJoin('md_kelompok as mk', 'md_jamaah.md_kelompok_id', '=', 'mk.id')
            ->leftJoin('st_kategori_jamaah as skj', 'md_jamaah.st_kategori_jamaah_id', '=', 'skj.id')
            ->leftJoin('st_status_jamaah as ssj', 'md_jamaah.st_status_jamaah_id', '=', 'ssj.id')
            ->whereNull('md_jamaah.deleted_at')
            ->get();
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

    public function checkIfUserExist($nik, $userID) {
        return $this->model->newQuery()
            ->where('nik', '!=', $nik)
            ->where('users_id', '=', $userID)
            ->exists();
    }

    public function create($data) {
        return $this->model->newQuery()
            ->create($data);
    }

    public function update($data, $nik) {
        return $this->model->newQuery()
            ->find($nik)
            ->update($data);
    }

    public function delete($nik) {
        return $this->model->newQuery()
            ->find($nik)
            ->delete();
    }
}
