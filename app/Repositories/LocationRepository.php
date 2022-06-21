<?php

namespace App\Repositories;

use App\Contracts\LocationInterface;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

class LocationRepository implements LocationInterface
{

    /**
     * @var Location
     */
    private $model;

    /**
     * @param Location $location
     */
    public function __construct(Location $location)
    {

        $this->model = $location;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }
}