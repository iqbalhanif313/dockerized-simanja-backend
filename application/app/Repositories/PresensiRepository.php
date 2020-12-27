<?php

namespace App\Repositories;

use App\Models\Presensi;
use Ramsey\Uuid\Uuid;
use DB;

class PresensiRepository
{
    /**
     * @var Presensi
     */
    protected $presensi;

    public function __construct(Presensi $presensi)
    {
        $this->presensi = $presensi;
    }

    public function getAll()
    {
        $query = "SELECT trans_presensi.*,md_jamaah.nama as nama_jamaah
        FROM trans_presensi
        LEFT JOIN trans_jadwal ON trans_presensi.trans_jadwal_id = trans_jadwal.id
        LEFT JOIN md_jamaah ON trans_presensi.md_jamaah_nik = md_jamaah.nik
        WHERE trans_presensi.deleted_at IS NULL";
        $data = DB::select($query);
        return $data;
    }

    public function getById($id)
    {
        $query = "SELECT trans_presensi.*,md_jamaah.nama as nama_jamaah
        FROM trans_presensi
        LEFT JOIN trans_jadwal ON trans_presensi.trans_jadwal_id = trans_jadwal.id
        LEFT JOIN md_jamaah ON trans_presensi.md_jamaah_nik = md_jamaah.nik
        WHERE trans_presensi.id = '$id'
        AND trans_presensi.deleted_at IS NULL";

        $data = DB::select($query);
        return $data;
    }

    public function getByTransJadwalId($trans_jadwal_id)
    {
        $query = "SELECT trans_presensi.*,md_jamaah.nama as nama_jamaah
        FROM trans_presensi
        LEFT JOIN trans_jadwal ON trans_presensi.trans_jadwal_id = trans_jadwal.id
        LEFT JOIN md_jamaah ON trans_presensi.md_jamaah_nik = md_jamaah.nik
        WHERE trans_presensi.trans_jadwal_id = '$trans_jadwal_id'
        AND trans_presensi.deleted_at IS NULL";

        $data = DB::select($query);
        return $data;
    }

    public function save($data)
    {
        $presensi = new $this->presensi;

        $presensi->id = Uuid::uuid1()->toString();
        $presensi->tanggal = $data['tanggal'];
        $presensi->jam_mulai = $data['jam_mulai'];
        $presensi->jam_selesai = $data['jam_selesai'];
        $presensi->md_kegiatan_id = $data['md_kegiatan_id'];
        $presensi->save();

        return $presensi->fresh();
    }

    public function update($data, $id)
    {
        
        $presensi = $this->presensi->find($id);

        $presensi->tanggal = $data['tanggal'];
        $presensi->jam_mulai = $data['jam_mulai'];
        $presensi->jam_selesai = $data['jam_selesai'];
        $presensi->md_kegiatan_id = $data['md_kegiatan_id'];

        $presensi->update();

        return $presensi;
    }

    public function delete($id)
    {
        
        $presensi = $this->presensi->find($id);
        $presensi->delete();

        return $presensi;
    }

}