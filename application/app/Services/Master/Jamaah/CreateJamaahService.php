<?php


namespace App\Services\Master\Jamaah;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Master\JamaahRepository;
use App\Services\Base\BaseCreateService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class CreateJamaahService extends BaseCreateService
{
    protected $repository;
    public function __construct(JamaahRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function create($data)
    {
        DB::beginTransaction();

        try {
            $user_is_exist = $this->repository->checkIfUserExist($data['nik'], ($data['users_id'] ?? -1));
            if ($user_is_exist)
                return ServiceHelper::result(false, MsgHelper::USER_ID_EXIST);
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
