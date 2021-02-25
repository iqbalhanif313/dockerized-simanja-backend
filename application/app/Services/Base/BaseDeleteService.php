<?php


namespace App\Services\Base;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseDeleteService
{
    protected $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function delete($id) {
        DB::beginTransaction();

        try {
            $this->repository->delete($id);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return ServiceHelper::result(false, MsgHelper::DELETE_FAIL);
        }

        DB::commit();
        return ServiceHelper::result(true, MsgHelper::DELETE_SUCCESS);
    }
}
