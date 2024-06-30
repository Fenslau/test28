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

    public function show($model): Car|bool
    {
        $car = Car::findOrFail($model);
        return $car;
    }

    public function store(array $modelData): Car|bool
    {
        $user = auth()->user();
        if ($user) $modelData['user_id'] = $user->id;
        $car = Car::create($modelData);
        return $car;
    }

    public function update($model, array $modelData): Car|bool
    {
        $model->update($modelData);
        return $model;
    }

    public function destroy($model): void
    {
        $model->delete();
    }
}
