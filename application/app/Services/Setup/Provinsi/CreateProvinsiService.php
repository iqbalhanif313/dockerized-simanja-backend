<?php


namespace App\Services\Setup\Provinsi;


use App\Repositories\Setup\ProvinsiRepository;
use App\Services\Base\BaseCreateService;

class CreateProvinsiService extends BaseCreateService
{
    protected $repository;
    public function __construct(ProvinsiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
