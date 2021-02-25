<?php


namespace App\Services\Master\Jamaah;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Master\JamaahRepository;
use App\Services\Base\BaseUpdateService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class UpdateJamaahService extends BaseUpdateService
{
    protected $repository;
    public function __construct(JamaahRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function update($data, $id)
    {
        DB::beginTransaction();

        try {
            $user_is_exist = $this->repository->checkIfUserExist($data['nik'], ($data['user_id'] ?? -1));
            if ($user_is_exist)
                return ServiceHelper::result(false, MsgHelper::USER_ID_EXIST);
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
