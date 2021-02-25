<?php


namespace App\Services\Master\Kepengurusan;


use App\Repositories\Master\KepengurusanRepository;
use App\Services\Base\BaseUpdateService;

class UpdateKepengurusanService extends BaseUpdateService
{
    protected $repository;
    public function __construct(KepengurusanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
