<?php


namespace App\Services\Master\Kegiatan;


use App\Helpers\MsgHelper;
use App\Helpers\ServiceHelper;
use App\Repositories\Master\KegiatanRepository;
use App\Services\Base\BaseDataService;

class DataKegiatanService extends BaseDataService
{
    protected $repository;
    public function __construct(KegiatanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }

    public function getRef()
    {
        try {
            $result = $this->repository->list('id, deskripsi as text');
        } catch (\Exception $e) {
            return ServiceHelper::result(false, MsgHelper::LOAD_FAIL);
        }
        return ServiceHelper::result(true, MsgHelper::LOAD_SUCCESS, $result);
    }
}
