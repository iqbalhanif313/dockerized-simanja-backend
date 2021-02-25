<?php


namespace App\Services\Setup\Level;


use App\Repositories\Setup\LevelRepository;
use App\Services\Base\BaseDataService;

class DataLevelService extends BaseDataService
{
    protected $repository;
    public function __construct(LevelRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
