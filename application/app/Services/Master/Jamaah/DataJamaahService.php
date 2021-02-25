<?php


namespace App\Services\Master\Jamaah;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Master\JamaahRepository;
use App\Services\Base\BaseDataService;

class DataJamaahService extends BaseDataService
{
    protected $repository;
    public function __construct(JamaahRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function getRef()
    {
        try {
            $result = $this->repository->list("nik as id, concat(nik, ' - ', nama) as text");
        } catch (\Exception $e) {
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }
}
