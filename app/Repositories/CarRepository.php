<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository implements RepositoryInterface
{

    public function index(?array $params = array())
    {
        $cars = Car::query()
            ->orderBy('updated_at', 'desc')
            ->paginate($params['limit'] ?? env('PAGINATE_PER_PAGE'))
            ->withQueryString();
        return $cars;
    }

    public function show(mixed $id): Car|bool
    {
        $car = Car::findOrFail($id);
        return $car;
    }

    public function store(array $modelData): Car|bool
    {
        $car = Car::create($modelData);
        return $car;
    }

    public function update($model, array $modelData): Car|bool
    {
        $model->update($modelData);
        return $model;
    }

    public function destroy($id): void
    {
        Car::findOrFail($id)->delete();
    }
}
