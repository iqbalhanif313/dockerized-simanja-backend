<?php


namespace App\Services\Setup\Kelurahan;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Setup\KelurahanRepository;
use App\Services\Base\BaseDataService;

class DataKelurahanService extends BaseDataService
{
    protected $repository;
    public function __construct(KelurahanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function getFRef($kec) {
        try {
            $result = $this->repository->flist($kec);
        } catch (\Exception $e) {
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }
}
