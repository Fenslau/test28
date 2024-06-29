<?php

namespace App\Repositories;

use App\Enums\InsurerType;
use App\Models\CarModel;

class CarModelRepository implements ReadonlyRepositoryInterface
{

    public function index(?array $params = array())
    {
        $carModels = CarModel::orderBy('title', 'asc')->get();
        if (!empty($params['with_brand'])) $carModels->load('carBrand');
        return $carModels;
    }
}
