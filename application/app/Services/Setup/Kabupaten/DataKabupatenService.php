<?php


namespace App\Services\Setup\Kabupaten;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Setup\KabupatenRepository;
use App\Services\Base\BaseDataService;

class DataKabupatenService extends BaseDataService
{
    protected $repository;
    public function __construct(KabupatenRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function getFRef($prov) {
        try {
            $result = $this->repository->flist($prov);
        } catch (\Exception $e) {
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }
}
