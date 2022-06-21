<?php

namespace App\Http\Controllers\API;

use App\Contracts\LocationInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LocationController extends Controller
{

    /**
     * @var LocationInterface
     */
    private $locationRepo;

    /**
     * @param LocationInterface $locationRepo
     */
    public function __construct(LocationInterface $locationRepo)
    {
        $this->locationRepo = $locationRepo;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $locations = $this->locationRepo->getAll();

        return LocationResource::collection($locations);
    }

}