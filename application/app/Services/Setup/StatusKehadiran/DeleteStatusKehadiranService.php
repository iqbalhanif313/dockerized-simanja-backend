<?php


namespace App\Services\Setup\StatusKehadiran;


use App\Repositories\Setup\StatusKehadiranRepository;
use App\Services\Base\BaseDeleteService;

class DeleteStatusKehadiranService extends BaseDeleteService
{
    protected $repository;
    public function __construct(StatusKehadiranRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
