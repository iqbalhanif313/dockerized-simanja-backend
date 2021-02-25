<?php


namespace App\Services\Setup\Provinsi;


use App\Repositories\Setup\ProvinsiRepository;
use App\Services\Base\BaseDeleteService;

class DeleteProvinsiService extends BaseDeleteService
{
    protected $repository;
    public function __construct(ProvinsiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
