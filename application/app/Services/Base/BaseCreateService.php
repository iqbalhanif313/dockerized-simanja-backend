<?php


namespace App\Services\Base;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseCreateService
{
    protected $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    private function checkIfIDExist($data) {
        if (isset($data['id'])) $id_is_exist = $this->repository->checkIfIDExist($data['id']);
        else return false;
        return $id_is_exist;
    }

    public function create($data) {
        DB::beginTransaction();

        try {
            if ($this->checkIfIDExist($data))
                return ServiceHelper::result(false, MsgHelper::ID_EXIST);
            $result = $this->repository->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return ServiceHelper::result(false, MsgHelper::CREATE_FAIL);
        }

        DB::commit();
        return ServiceHelper::result(true, MsgHelper::CREATE_SUCCESS, $result);
    }
}
