<?php


namespace App\Services\Trans\Jadwal;


use App\Helpers\DateTimeHelper;
use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Trans\JadwalRepository;
use App\Services\Base\BaseUpdateService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateJadwalService extends BaseUpdateService
{
    protected $repository;
    public function __construct(JadwalRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function update($data, $id)
    {
        DB::beginTransaction();

        try {
            $timediff = DateTimeHelper::diff($data['jam_mulai'], $data['jam_selesai'], 'sign');
            if ($timediff == '-') return ServiceHelper::result(false, MsgHelper::JAM_CRASH);
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
