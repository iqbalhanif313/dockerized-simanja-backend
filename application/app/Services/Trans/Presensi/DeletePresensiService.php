<?php


namespace App\Services\Trans\Presensi;


use App\Repositories\Trans\PresensiRepository;
use App\Services\Base\BaseDeleteService;

class DeletePresensiService extends BaseDeleteService
{
    protected $repository;
    public function __construct(PresensiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
