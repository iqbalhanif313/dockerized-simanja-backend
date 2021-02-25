<?php


namespace App\Services\Setup\Kepengurusan;


use App\Repositories\Setup\KepengurusanRepository;
use App\Services\Base\BaseDataService;

class DataKepengurusanService extends BaseDataService
{
    protected $repository;
    public function __construct(KepengurusanRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
