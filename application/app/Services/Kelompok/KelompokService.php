<?php

namespace App\Services\Kelompok;

use App\Models\Kelompok;
use App\Repositories\KelompokRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KelompokService
{

    protected $kelompokRepository;

    public function __construct(KelompokRepository $kelompokRepository)
    {
        $this->kelompokRepository = $kelompokRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $kelompok = $this->kelompokRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete kelompok data');
        }

        DB::commit();

        return $kelompok;

    }

    public function getAll()
    {
        return $this->kelompokRepository->getAll();
    }

    public function getById($id)
    {
        return $this->kelompokRepository->getById($id);
    }

    public function updateData($data, $id)
    {
        $validator = Validator::make($data, [
            'nama' => 'bail|max:255',        
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $kelompok = $this->kelompokRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update kelompok data');
        }

        DB::commit();

        return $kelompok;

    }

    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required',
            'nama' => 'required',
            'st_desa_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->kelompokRepository->save($data);

        return $result;
    }

}