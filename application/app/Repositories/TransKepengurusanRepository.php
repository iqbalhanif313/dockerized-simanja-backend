<?php

namespace App\Repositories;

use App\Models\TransKepengurusan;
use DB;
use Ramsey\Uuid\Uuid;

class TransKepengurusanRepository
{
    /**
     * @var TransKepengurusan
     */
    protected $model;

    public function __construct(TransKepengurusan $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->newQuery()
            ->selectRaw(
                "trans_kepengurusan.id,
                trans_kepengurusan.md_jamaah_nik,
                case when mj.nama is null then '-' else mj.nama end as nama_jamaah,
                trans_kepengurusan.md_kepengurusan_id,
                case when mk.nama is null then '-' else mk.nama end as nama_kepengurusan,
                case when sk.nama is null then '-' else sk.nama end as kategori,
                case when sl.nama is null then '-' else sl.nama end as level"
            )
            ->leftJoin('md_jamaah as mj', 'trans_kepengurusan.md_jamaah_nik', '=', 'mj.nik')
            ->leftJoin('md_kepengurusan as mk', 'trans_kepengurusan.md_kepengurusan_id', '=', 'mk.id')
            ->leftJoin('st_kepengurusan as sk', 'mk.st_kepengurusan_id', '=', 'sk.id')
            ->leftJoin('st_level as sl', 'mk.st_level_id', '=', 'sl.id')
            ->whereNull('trans_kepengurusan.deleted_at')
            ->get();
    }

    public function getById($id)
    {
        $query = "SELECT md_jamaah.nama as nama_jamaah,trans_kepengurusan.*,md_kepengurusan.nama,md_kepengurusan.st_level_id,st_kepengurusan.nama as kategori,st_level.nama as level
        FROM trans_kepengurusan
        LEFT JOIN md_jamaah ON trans_kepengurusan.md_jamaah_nik = md_jamaah.nik
        LEFT JOIN md_kepengurusan ON trans_kepengurusan.md_kepengurusan_id = md_kepengurusan.id
        LEFT JOIN st_kepengurusan ON md_kepengurusan.st_kepengurusan_id = st_kepengurusan.id
        LEFT JOIN st_level ON md_kepengurusan.st_level_id = st_level.id
        WHERE trans_kepengurusan.id = '$id'";
        $data = DB::select($query);
        return $data;
    }

    public function save($data)
    {
        $data['id'] = Uuid::uuid1()->toString();
        return $this->model->newQuery()
            ->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->newQuery()
            ->find($id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->newQuery()
            ->find($id)
            ->delete();
    }

}
