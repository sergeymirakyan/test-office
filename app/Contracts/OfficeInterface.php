<?php

namespace App\Contracts;

use App\Models\Office;
use Illuminate\Database\Eloquent\Collection;

interface OfficeInterface
{
    /**
     * @return mixed
     */
    public function getAll(): Collection;

    /**
     * @param $data
     * @return mixed
     */
    public function store($data): Office;

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data): bool;

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): bool;
}