<?php


namespace App\Services\Setup\Level;


use App\Repositories\Setup\LevelRepository;
use App\Services\Base\BaseCreateService;

class CreateLevelService extends BaseCreateService
{
    protected $repository;
    public function __construct(LevelRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
