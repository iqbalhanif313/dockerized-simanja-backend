<?php


namespace App\Services\Setup\Kecamatan;


use App\Repositories\Setup\KecamatanRepository;
use App\Services\Base\BaseUpdateService;

class UpdateKecamatanService extends BaseUpdateService
{
    protected $repository;
    public function __construct(KecamatanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
