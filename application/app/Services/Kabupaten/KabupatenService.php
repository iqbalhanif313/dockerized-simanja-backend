<?php


namespace App\Services\Kabupaten;


use App\Models\Kabupaten;
use App\Repositories\KabupatenRepository;
class KabupatenService
{
    protected $kabupatenRepository;

    public function __construct(KabupatenRepository $kabupatenRepository)
    {
        $this->kabupatenRepository = $kabupatenRepository;
    }
    public function getAll(){
        return $this->kabupatenRepository->getAll();
    }

}
