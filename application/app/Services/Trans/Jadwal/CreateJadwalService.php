<?php


namespace App\Services\Trans\Jadwal;


use App\Repositories\Trans\JadwalRepository;
use App\Services\Base\BaseCreateService;

class CreateJadwalService extends BaseCreateService
{
    protected $repository;
    public function __construct(JadwalRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
