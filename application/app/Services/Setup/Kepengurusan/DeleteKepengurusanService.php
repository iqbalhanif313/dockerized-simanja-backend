<?php


namespace App\Services\Setup\Kepengurusan;


use App\Repositories\Setup\KepengurusanRepository;
use App\Services\Base\BaseDeleteService;

class DeleteKepengurusanService extends BaseDeleteService
{
    protected $repository;
    public function __construct(KepengurusanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
