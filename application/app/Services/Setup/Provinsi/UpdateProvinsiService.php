<?php


namespace App\Services\Setup\Provinsi;


use App\Repositories\Setup\ProvinsiRepository;
use App\Services\Base\BaseUpdateService;

class UpdateProvinsiService extends BaseUpdateService
{
    protected $repository;
    public function __construct(ProvinsiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
