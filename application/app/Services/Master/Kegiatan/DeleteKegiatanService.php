<?php


namespace App\Services\Master\Kegiatan;


use App\Repositories\Master\KegiatanRepository;
use App\Services\Base\BaseDeleteService;

class DeleteKegiatanService extends BaseDeleteService
{
    protected $repository;
    public function __construct(KegiatanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
