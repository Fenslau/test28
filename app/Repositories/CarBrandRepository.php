<?php

namespace App\Repositories;

use App\Models\CarBrand;

class CarBrandRepository implements ReadonlyRepositoryInterface
{

    public function index(?array $params = array())
    {
        $carBrands = CarBrand::orderBy('title', 'asc')->get();
        if (!empty($params['with_models'])) $carBrands->load('carModels');
        return $carBrands;
    }
}
