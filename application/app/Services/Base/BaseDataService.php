<?php


namespace App\Services\Base;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use Illuminate\Support\Facades\Log;

class BaseDataService
{
    protected $repository;
    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function getAll() {
        try {
            $result = $this->repository->data();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }

    public function getByID($id) {
        try {
            $result = $this->repository->dataByID($id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }

    public function getRef() {
        try {
            $result = $this->repository->list();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }
}
