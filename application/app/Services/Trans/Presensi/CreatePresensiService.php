<?php


namespace App\Services\Trans\Presensi;


use App\Repositories\Trans\PresensiRepository;
use App\Services\Base\BaseCreateService;

class CreatePresensiService extends BaseCreateService
{
    protected $repository;
    public function __construct(PresensiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
