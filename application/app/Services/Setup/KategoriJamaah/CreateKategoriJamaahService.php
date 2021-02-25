<?php


namespace App\Services\Setup\KategoriJamaah;


use App\Repositories\Setup\KategoriJamaahRepository;
use App\Services\Base\BaseCreateService;

class CreateKategoriJamaahService extends BaseCreateService
{
    protected $repository;
    public function __construct(KategoriJamaahRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
