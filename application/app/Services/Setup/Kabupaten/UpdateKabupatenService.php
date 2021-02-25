<?php


namespace App\Services\Setup\Kabupaten;


use App\Repositories\Setup\KabupatenRepository;
use App\Services\Base\BaseUpdateService;

class UpdateKabupatenService extends BaseUpdateService
{
    protected $repository;
    public function __construct(KabupatenRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($this->repository);
    }
}
