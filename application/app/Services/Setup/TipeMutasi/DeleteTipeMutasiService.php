<?php


namespace App\Services\Setup\TipeMutasi;


use App\Repositories\Setup\TipeMutasiRepository;
use App\Services\Base\BaseDeleteService;

class DeleteTipeMutasiService extends BaseDeleteService
{
    protected $repository;
    public function __construct(TipeMutasiRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
