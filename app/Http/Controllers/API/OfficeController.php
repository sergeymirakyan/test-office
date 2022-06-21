<?php

namespace App\Http\Controllers\API;

use App\Contracts\OfficeInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Http\Resources\OfficeResource;
use App\Models\Office;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    /**
     * @var OfficeInterface
     */
    private $officeRepo;

    /**
     * @param OfficeInterface $officeRepo
     */
    public function __construct(OfficeInterface $officeRepo)
    {

        $this->officeRepo = $officeRepo;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $offices = $this->officeRepo->getAll();

        return OfficeResource::collection($offices);
    }

    /**
     * @param StoreOfficeRequest $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function store(StoreOfficeRequest $request)
    {
        try {
            DB::beginTransaction();
            $officeData = $request->except('location_id');
            $office = $this->officeRepo->store($officeData);
            $office->locations()->sync($request->location_id);
            DB::commit();

            return response()->json([
                'type'      => 'success',
                'office'    =>  new OfficeResource($office)
            ])->setStatusCode(201);
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json([
            'type'      => 'error',
            'message'   => $exception->getMessage(),
            ])->setStatusCode(500);
        }
    }

    /**
     * @param Office $office
     * @param UpdateOfficeRequest $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function update(Office $office, UpdateOfficeRequest $request)
    {
        try {
            DB::beginTransaction();
            $officeUpdateData = $request->only('name');
            $this->officeRepo->update($office->id, $officeUpdateData);
            if (isset($request->location_id)) {
                $office->locations()->sync($request->location_id);
            }
            DB::commit();

            return response()->json([
                'type'      => 'success',
            ])->setStatusCode(200);
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json([
                'type'      => 'error',
                'message'   => $exception->getMessage(),
            ])->setStatusCode($exception->getCode());
        }
    }

    /**
     * @param Office $office
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function destroy(Office $office)
    {
        $this->officeRepo->delete($office->id);
        $office->locations()->sync([]);

        return response()->json([
            'type'      => 'success',
        ])->setStatusCode(200);
    }
}
