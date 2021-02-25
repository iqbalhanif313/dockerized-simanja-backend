<?php


namespace App\Services\Base;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseUpdateService
{
    protected $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function update($data, $id) {
        DB::beginTransaction();

        try {
            $this->repository->update($data, $id);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return ServiceHelper::result(false, MsgHelper::UPDATE_FAIL);
        }

        DB::commit();
        return ServiceHelper::result(true, MsgHelper::UPDATE_SUCCESS);
    }
}
