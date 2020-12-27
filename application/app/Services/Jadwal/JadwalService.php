<?php

namespace App\Services\Jadwal;

use App\Models\Jadwal;
use App\Repositories\JadwalRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class JadwalService
{

    protected $jadwalRepository;

    public function __construct(JadwalRepository $jadwalRepository)
    {
        $this->jadwalRepository = $jadwalRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $jadwal = $this->jadwalRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete jadwal data');
        }

        DB::commit();

        return $jadwal;

    }

    public function getAll()
    {
        return $this->jadwalRepository->getAll();
    }

    public function getById($id)
    {
        return $this->jadwalRepository->getById($id);
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
            $jadwal = $this->jadwalRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update jadwal data');
        }

        DB::commit();

        return $jadwal;

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

        $result = $this->jadwalRepository->save($data);

        return $result;
    }

}