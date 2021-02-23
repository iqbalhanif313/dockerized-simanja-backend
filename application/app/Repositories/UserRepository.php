<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function data($columns = '*') {
        return $this->model->newQuery()
            ->selectRaw($columns)
            ->get();
    }

    public function list() {
        return $this->model->newQuery()
            ->selectRaw("id, concat(id, ' - ', email) as text")
            ->get();
    }

    public function dataByID($id, $columns = '*') {
        return $this->model->newQuery()
            ->selectRaw($columns)
            ->findOrFail($id);
    }
}
