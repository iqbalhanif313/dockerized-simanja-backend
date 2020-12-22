<?php

namespace App\Repositories;

use App\Models\st_desa as Desa;
use DB;

class DesaRepository
{
    /**
     * @var Desa
     */
    protected $desa;

    public function __construct(Desa $desa)
    {
        $this->desa = $desa;
    }

    public function getAll()
    {
        $query = "SELECT id,CONCAT(id,'- ',nama) as nama FROM st_desa";
        $data = DB::select($query);
        return $data;
    }

    public function getById($id)
    {
        return $this->desa
            ->where('id', $id)
            ->get();
    }

    public function save($data)
    {
        $desa = new $this->desa;

        $desa->id = $data['id'];
        $desa->nama = $data['nama'];

        $desa->save();

        return $desa->fresh();
    }

    public function update($data, $id)
    {
        
        $desa = $this->desa->find($id);

        $desa->title = $data['title'];
        $desa->description = $data['description'];

        $desa->update();

        return $desa;
    }

    public function delete($id)
    {
        
        $desa = $this->desa->find($id);
        $desa->delete();

        return $desa;
    }

}