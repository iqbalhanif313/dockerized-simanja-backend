<?php


namespace App\Services\Trans\Presensi;


use App\Repositories\Trans\PresensiRepository;
use App\Services\Base\BaseUpdateService;

class UpdatePresensiService extends BaseUpdateService
{
    protected $repository;
    public function __construct(PresensiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
