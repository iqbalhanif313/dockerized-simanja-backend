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
    protected $transKepengurusan;

    public function __construct(TransKepengurusan $transKepengurusan)
    {
        $this->transKepengurusan = $transKepengurusan;
    }

    public function getAll()
    {
        $query = "SELECT md_jamaah.nama as nama_jamaah,trans_kepengurusan.*,md_kepengurusan.nama,md_kepengurusan.st_level_id,st_kepengurusan.nama as kategori,st_level.nama as level
        FROM trans_kepengurusan
        LEFT JOIN md_jamaah ON trans_kepengurusan.md_jamaah_nik = md_jamaah.nik
        LEFT JOIN md_kepengurusan ON trans_kepengurusan.md_kepengurusan_id = md_kepengurusan.id
        LEFT JOIN st_kepengurusan ON md_kepengurusan.st_kepengurusan_id = st_kepengurusan.id
        LEFT JOIN st_level ON md_kepengurusan.st_level_id = st_level.id";
        $data = DB::select($query);
        return $data;
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
        $transKepengurusan = new $this->transKepengurusan;
        $transKepengurusan->id = Uuid::uuid1()->toString();
        $transKepengurusan->md_jamaah_nik = $data['md_jamaah_nik'];
        $transKepengurusan->md_kepengurusan_id = $data['md_kepengurusan_id'];
        $transKepengurusan->save();

        return $transKepengurusan->fresh();
    }

    public function update($data, $id)
    {
        
        $transKepengurusan = $this->transKepengurusan->find($id);
        $transKepengurusan->md_jamaah_nik = $data['md_jamaah_nik'];
        $transKepengurusan->md_kepengurusan_id = $data['md_kepengurusan_id'];
        $transKepengurusan->save();

        $transKepengurusan->update();

        return $transKepengurusan;
    }

    public function delete($id)
    {
        
        $transKepengurusan = $this->transKepengurusan->find($id);
        $transKepengurusan->delete();

        return $transKepengurusan;
    }

}