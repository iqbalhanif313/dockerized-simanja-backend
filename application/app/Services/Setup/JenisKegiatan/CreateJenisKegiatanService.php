<?php


namespace App\Services\Setup\JenisKegiatan;


use App\Repositories\Setup\JenisKegiatanRepository;
use App\Services\Base\BaseCreateService;

class CreateJenisKegiatanService extends BaseCreateService
{
    protected $repository;
    public function __construct(JenisKegiatanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
