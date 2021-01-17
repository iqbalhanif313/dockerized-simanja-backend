<?php

namespace App\Repositories;

use App\Models\Provinsi;
use DB;

class ProvinsiRepository
{
    /**
     * @var Provinsi
     */
    protected $provinsi;

    public function __construct(Provinsi $provinsi)
    {
        $this->provinsi = $provinsi;
    }

    public function getAll()
    {
        $data = Provinsi::all();
        return $data;
    }

    public function getById($id)
    {
        return $this->provinsi
            ->where('id', $id)
            ->get();
    }

}