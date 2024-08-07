<?php

namespace App\Http\Controllers;

use App\Helpers\Result;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(
        private RepositoryInterface $repo,
        private Result $result
    ) {
    }

    public function index(CarRequest $request)
    {
        $cars = $this->repo->index($request->validated());
        return CarResource::collection($cars);
    }

    public function show($id)
    {
        $car = $this->repo->show($id);
        return new CarResource($car);
    }

    public function store(CarRequest $request)
    {
        $car = $this->repo->store($request->validated());
        return new CarResource($car);
    }

    public function update(CarRequest $request, Car $car)
    {
        $car = $this->repo->update($car, $request->validated());
        return new CarResource($car);
    }

    public function destroy(Car $car)
    {
        $this->repo->destroy($car);
        return $this->result->success(
            __('Deleted successfully')
        );
    }
}
