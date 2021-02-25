<?php


namespace App\Services\Master\Jamaah;


use App\Repositories\Master\JamaahRepository;
use App\Services\Base\BaseDeleteService;

class DeleteJamaahService extends BaseDeleteService
{
    protected $repository;
    public function __construct(JamaahRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
