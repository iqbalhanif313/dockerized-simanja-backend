<?php

namespace App\Services\Kepengurusan;

use App\Models\Kepengurusan;
use App\Repositories\KepengurusanRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KepengurusanService
{

    protected $kepengurusanRepository;

    public function __construct(KepengurusanRepository $kepengurusanRepository)
    {
        $this->kepengurusanRepository = $kepengurusanRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $kepengurusan = $this->kepengurusanRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete kepengurusan data');
        }

        DB::commit();

        return $kepengurusan;

    }

    public function getAll()
    {
        return $this->kepengurusanRepository->getAll();
    }

    public function getRef() {
        return $this->kepengurusanRepository->getRef();
    }

    public function getById($id)
    {
        return $this->kepengurusanRepository->getById($id);
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
            $kepengurusan = $this->kepengurusanRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update kepengurusan data');
        }

        DB::commit();

        return $kepengurusan;

    }

    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required',
            'nama' => 'required',
            'st_kepengurusan_id' => 'required',
            'st_level_id' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->kepengurusanRepository->save($data);

        return $result;
    }

}
