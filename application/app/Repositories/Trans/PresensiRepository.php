<?php

namespace App\Repositories\Trans;

use App\Models\Trans\Presensi;
use App\Repositories\BaseRepository;
use Ramsey\Uuid\Uuid;

class PresensiRepository extends BaseRepository
{
    public function __construct(Presensi $model)
    {
        parent::__construct($model);
    }

    private function select_statement() {
        return "trans_presensi.id,
                trans_presensi.jam_kehadiran,
                trans_presensi.keterangan,
                trans_presensi.md_jamaah_nik,
                case when mj.nama is null then '-' else mj.nama end as nama_jamaah,
                trans_presensi.trans_jadwal_id,
                trans_presensi.st_status_kehadiran_id,
                case when ssk.nama is null then '-' else ssk.nama end as status";
    }

    public function data($columns = '*') {
        return $this->model->newQuery()
            ->selectRaw($this->select_statement())
            ->leftJoin('trans_jadwal as tj', 'trans_presensi.trans_jadwal_id', '=', 'tj.id')
            ->leftJoin('md_jamaah as mj', 'trans_presensi.md_jamaah_nik', '=', 'mj.nik')
            ->leftJoin('st_status_kehadiran as ssk', 'trans_presensi.st_status_kehadiran_id', '=', 'ssk.id')
            ->whereNull('trans_presensi.deleted_at')
            ->get();
    }

    public function dataByJadwal($trans_jadwal_id)
    {
        return $this->model->newQuery()
            ->selectRaw($this->select_statement())
            ->leftJoin('trans_jadwal as tj', 'trans_presensi.trans_jadwal_id', '=', 'tj.id')
            ->leftJoin('md_jamaah as mj', 'trans_presensi.md_jamaah_nik', '=', 'mj.nik')
            ->leftJoin('st_status_kehadiran as ssk', 'trans_presensi.st_status_kehadiran_id', '=', 'ssk.id')
            ->where('trans_presensi.trans_jadwal_id', '=', $trans_jadwal_id)
            ->whereNull('trans_presensi.deleted_at')
            ->get();
    }

    public function create($data)
    {
        $data['id'] = Uuid::uuid1()->toString();
        return parent::create($data); // TODO: Change the autogenerated stub
    }
}
