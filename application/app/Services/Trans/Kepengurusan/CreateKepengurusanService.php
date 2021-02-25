<?php


namespace App\Services\Trans\Kepengurusan;


use App\Repositories\Trans\KepengurusanRepository;
use App\Services\Base\BaseCreateService;

class CreateKepengurusanService extends BaseCreateService
{
    protected $repository;
    public function __construct(KepengurusanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
