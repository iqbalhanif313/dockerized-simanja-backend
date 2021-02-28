<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function data($columns = '*') {
        return $this->model->newQuery()
            ->selectRaw($columns)
            ->whereNull('deleted_at')
            ->get();
    }

    public function dataByID($id, $columns = '*') {
        return $this->model->newQuery()
            ->selectRaw($columns)
            ->findOrFail($id);
    }

    public function list($columns = "id, concat(id, ' - ', nama) as text") {
        return $this->model->newQuery()
            ->selectRaw($columns)
            ->whereNull('deleted_at')
            ->get();
    }

    public function checkIfIDExist($id) {
        return $this->model->newQuery()
            ->find($id);
    }

    public function create($data) {
        return $this->model->newQuery()
            ->create($data);
    }

    public function update($data, $id) {
        return $this->model->newQuery()
            ->find($id)
            ->update($data);
    }

    public function delete($id) {
        return $this->model->newQuery()
            ->find($id)
            ->delete();
    }
}
