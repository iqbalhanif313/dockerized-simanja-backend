<?php

namespace App\Services\Desa;

use App\Models\Desa;
use App\Repositories\DesaRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class DesaService
{

    protected $desaRepository;

    public function __construct(DesaRepository $desaRepository)
    {
        $this->desaRepository = $desaRepository;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $desa = $this->desaRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete desa data');
        }

        DB::commit();

        return $desa;

    }

    public function getAll()
    {
        return $this->desaRepository->getAll();
    }

    public function getById($id)
    {
        return $this->desaRepository->getById($id);
    }

    public function updateData($data, $id)
    {
        $validator = Validator::make($data, [
            'nama' => 'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $desa = $this->desaRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update desa data');
        }

        DB::commit();

        return $desa;

    }

    public function saveData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required',
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->desaRepository->save($data);

        return $result;
    }

}