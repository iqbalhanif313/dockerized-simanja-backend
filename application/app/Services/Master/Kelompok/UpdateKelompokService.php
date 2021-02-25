<?php


namespace App\Services\Master\Kelompok;


use App\Repositories\Master\KelompokRepository;
use App\Services\Base\BaseUpdateService;

class UpdateKelompokService extends BaseUpdateService
{
    protected $repository;
    public function __construct(KelompokRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
