<?php


namespace App\Services\Setup\Kelurahan;


use App\Repositories\Setup\KelurahanRepository;
use App\Services\Base\BaseCreateService;

class CreateKelurahanService extends BaseCreateService
{
    protected $repository;
    public function __construct(KelurahanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
