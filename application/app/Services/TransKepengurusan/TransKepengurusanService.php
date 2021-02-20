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

    protected $repository;

    public function __construct(TransKepengurusanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $this->repository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return false;
        }

        DB::commit();

        return true;

    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
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
            $result = $this->repository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update transKepengurusan data');
        }

        DB::commit();

        return $result;

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

        DB::beginTransaction();

        try {
            $result = $this->repository->save($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to create kepengurusan data');
        }

        DB::commit();

        return $result;
    }

}
