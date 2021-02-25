<?php


namespace App\Services\Setup\StatusJamaah;


use App\Repositories\Setup\StatusJamaahRepository;
use App\Services\Base\BaseCreateService;

class CreateStatusJamaahService extends BaseCreateService
{
    protected $repository;
    public function __construct(StatusJamaahRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
