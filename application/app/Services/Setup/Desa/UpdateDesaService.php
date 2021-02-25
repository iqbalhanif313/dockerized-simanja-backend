<?php


namespace App\Services\Setup\Desa;


use App\Repositories\Setup\DesaRepository;
use App\Services\Base\BaseUpdateService;

class UpdateDesaService extends BaseUpdateService
{
    protected $repository;
    public function __construct(DesaRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
