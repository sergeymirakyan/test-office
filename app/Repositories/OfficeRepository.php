<?php

namespace App\Repositories;

use App\Contracts\OfficeInterface;
use App\Models\Office;
use Illuminate\Database\Eloquent\Collection;

class OfficeRepository implements OfficeInterface
{
    /**
     * @var Office
     */
    private $model;

    /**
     * @param Office $office
     */
    public function __construct(Office $office)
    {

        $this->model = $office;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model
            ->with('locations.country')
            ->get();
    }

    /**
     * @param $data
     * @return Office
     */
    public function store($data): Office
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data): bool
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return $this->model->where('id', $id)
            ->delete();
    }


}