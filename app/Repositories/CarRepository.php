<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Support\Facades\Cache;

class CarRepository implements RepositoryInterface
{

    public function index(?array $params = array())
    {
        $page = $params['page'] ?? 1;
        $limit = $params['limit'] ?? env('PAGINATE_PER_PAGE');
        $path = 'cars/' .  $page . '/' . $limit;
        $cars = Cache::tags(['cars'])->rememberForever($path, function () use ($limit) {
            $cars = Car::query()
                ->orderBy('updated_at', 'desc')
                ->paginate($limit)
                ->withQueryString();
            return $cars;
        });
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
