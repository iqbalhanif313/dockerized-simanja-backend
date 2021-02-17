<?php

namespace App\Services\Kegiatan;

use App\Models\Kegiatan;
use App\Repositories\KegiatanRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KegiatanService
{

    protected $kegiatanRepository;

    public function __construct(KegiatanRepository $kegiatanRepository)
    {
        $this->kegiatanRepository = $kegiatanRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $kegiatan = $this->kegiatanRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete kegiatan data');
        }

        DB::commit();

        return $kegiatan;
    }

    public function getAll()
    {
        return $this->kegiatanRepository->getAll();
    }

    public function getRef() {
        return $this->kegiatanRepository->getRef();
    }

    public function getById($id)
    {
        return $this->kegiatanRepository->getById($id);
    }

    public function updateData($data, $id)
    {
        $validator = Validator::make($data, [
            'deskripsi' => 'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $kegiatan = $this->kegiatanRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update kegiatan data');
        }

        DB::commit();

        return $kegiatan;

    }

    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required',
            'deskripsi' => 'required',
            'st_level_id' => 'required',
            'st_jenis_kegiatan_id' => 'required',
            'st_kategori_jamaah_id' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->kegiatanRepository->save($data);

        return $result;
    }

}
