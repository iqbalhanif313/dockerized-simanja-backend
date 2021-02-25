<?php


namespace App\Services\Setup\KategoriJamaah;


use App\Repositories\Setup\KategoriJamaahRepository;
use App\Services\Base\BaseUpdateService;

class UpdateKategoriJamaahService extends BaseUpdateService
{
    protected $repository;
    public function __construct(KategoriJamaahRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
