<?php


namespace App\Services\Setup\StatusKehadiran;


use App\Repositories\Setup\StatusKehadiranRepository;
use App\Services\Base\BaseUpdateService;

class UpdateStatusKehadiranService extends BaseUpdateService
{
    protected $repository;
    public function __construct(StatusKehadiranRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
