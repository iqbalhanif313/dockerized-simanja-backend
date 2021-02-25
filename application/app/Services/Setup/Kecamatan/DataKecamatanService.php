<?php


namespace App\Services\Setup\Kecamatan;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Setup\KecamatanRepository;
use App\Services\Base\BaseDataService;

class DataKecamatanService extends BaseDataService
{
    protected $repository;
    public function __construct(KecamatanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function getFRef($kab) {
        try {
            $result = $this->repository->flist($kab);
        } catch (\Exception $e) {
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }
}
