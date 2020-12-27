<?php

namespace App\Services\Presensi;

use App\Models\Presensi;
use App\Repositories\PresensiRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PresensiService
{

    protected $presensiRepository;

    public function __construct(PresensiRepository $presensiRepository)
    {
        $this->presensiRepository = $presensiRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $presensi = $this->presensiRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete presensi data');
        }

        DB::commit();

        return $presensi;

    }

    public function getAll()
    {
        return $this->presensiRepository->getAll();
    }

    public function getById($id)
    {
        return $this->presensiRepository->getById($id);
    }

    public function getByTransJadwalId($trans_jadwal_id)
    {
        return $this->presensiRepository->getByTransJadwalId($trans_jadwal_id);
    }


    public function updateData($data, $id)
    {
        $validator = Validator::make($data, [
            'tanggal' => 'bail',
            'jam_mulai' => 'bail',
            'jam_selesai' => 'bail',
            'md_kegiatan_id' => 'bail'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $presensi = $this->presensiRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update presensi data');
        }

        DB::commit();

        return $presensi;

    }

    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'md_kegiatan_id' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->presensiRepository->save($data);

        return $result;
    }

}