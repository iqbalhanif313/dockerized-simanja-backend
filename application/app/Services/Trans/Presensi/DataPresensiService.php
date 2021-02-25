<?php


namespace App\Services\Trans\Presensi;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Trans\PresensiRepository;
use App\Services\Base\BaseDataService;

class DataPresensiService extends BaseDataService
{
    protected $repository;
    public function __construct(PresensiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function getByJadwal($trans_jadwal_id)
    {
        try {
            $result = $this->repository->dataByJadwal($trans_jadwal_id);
        } catch (\Exception $e) {
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }
}
