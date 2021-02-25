<?php


namespace App\Services\Setup\Kabupaten;


use App\Repositories\Setup\KabupatenRepository;
use App\Services\Base\BaseDeleteService;

class DeleteKabupatenService extends BaseDeleteService
{
    protected $repository;
    public function __construct(KabupatenRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
