<?php

namespace App\Services\Kegiatan;

use App\Helpers\MsgHelper;
use App\Repositories\KegiatanRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class KegiatanService
{

    protected $repository;

    public function __construct(KegiatanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->data();
    }

    public function getRef() {
        return $this->repository->list();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create($data) {
        DB::beginTransaction();

        try {
            $result = $this->repository->create($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException(MsgHelper::CREATE_FAIL);
        }

        DB::commit();

        return $result;
    }

    public function update($data, $id) {
        DB::beginTransaction();

        try {
            $result = $this->repository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException(MsgHelper::UPDATE_FAIL);
        }

        DB::commit();

        return $result;
    }

    public function delete($id)
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
}
