<?php


namespace App\Services\Master\Kelompok;


use App\Repositories\Master\KelompokRepository;
use App\Services\Base\BaseDataService;

class DataKelompokService extends BaseDataService
{
    protected $repository;
    public function __construct(KelompokRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
