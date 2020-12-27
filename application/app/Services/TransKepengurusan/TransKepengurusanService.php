<?php

namespace App\Services\TransKepengurusan;

use App\Models\TransKepengurusan;
use App\Repositories\TransKepengurusanRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class TransKepengurusanService
{

    protected $transKepengurusanRepository;

    public function __construct(TransKepengurusanRepository $transKepengurusanRepository)
    {
        $this->transKepengurusanRepository = $transKepengurusanRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $transKepengurusan = $this->transKepengurusanRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete transKepengurusan data');
        }

        DB::commit();

        return $transKepengurusan;

    }

    public function getAll()
    {
        return $this->transKepengurusanRepository->getAll();
    }

    public function getById($id)
    {
        return $this->transKepengurusanRepository->getById($id);
    }

    public function updateData($data, $id)
    {
        $validator = Validator::make($data, [
            'md_jamaah_nik' => 'bail', 
            'md_kepengurusan_id' => 'bail'       
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $transKepengurusan = $this->transKepengurusanRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update transKepengurusan data');
        }

        DB::commit();

        return $transKepengurusan;

    }

    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'md_jamaah_nik' => 'required',
            'md_kepengurusan_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->transKepengurusanRepository->save($data);

        return $result;
    }

}