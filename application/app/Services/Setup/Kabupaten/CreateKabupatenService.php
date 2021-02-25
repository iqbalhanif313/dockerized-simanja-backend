<?php


namespace App\Services\Setup\Kabupaten;


use App\Repositories\Setup\KabupatenRepository;
use App\Services\Base\BaseCreateService;

class CreateKabupatenService extends BaseCreateService
{
    protected $repository;
    public function __construct(KabupatenRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
