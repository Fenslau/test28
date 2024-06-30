<?php

namespace App\Repositories;

use App\Models\CarBrand;
use Illuminate\Support\Facades\Cache;

class CarBrandRepository implements ReadonlyRepositoryInterface
{

    public function index(?array $params = array())
    {
        if (!empty($params['with_models'])) $path = 'brands_with_models';
        else $path = 'brands_without_models';
        $carBrands = Cache::tags(['brands'])->rememberForever($path, function () use ($params) {
            $carBrands = CarBrand::orderBy('title', 'asc');
            if (!empty($params['with_models'])) $carBrands->with('carModels');
            $carBrands = $carBrands->get();
            return $carBrands;
        });
        return $carBrands;
    }
}
