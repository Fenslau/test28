<?php

namespace App\Repositories;

use App\Models\CarModel;
use Illuminate\Support\Facades\Cache;

class CarModelRepository implements ReadonlyRepositoryInterface
{

    public function index(?array $params = array())
    {
        if (!empty($params['with_brand'])) $path = 'models_with_brand';
        else $path = 'models_without_brand';
        $carModels = Cache::tags(['models'])->rememberForever($path, function () use ($params) {
            $carModels = CarModel::orderBy('title', 'asc');
            if (!empty($params['with_brand'])) $carModels->with('carBrand');
            $carModels = $carModels->get();
            return $carModels;
        });
        return $carModels;
    }
}
