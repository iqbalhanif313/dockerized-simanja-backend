<?php


namespace App\Services\Auth;


use App\Repositories\UserRepository;

class UserDataService
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getData() {
        return $this->repository->data();
    }

    public function getRef() {
        return $this->repository->list();
    }

    public function getDataByID($id) {
        return $this->repository->dataByID($id);
    }
}
