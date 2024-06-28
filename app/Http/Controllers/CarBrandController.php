<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarBrandResource;
use App\Repositories\ReadonlyRepositoryInterface;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    public function __construct(
        private ReadonlyRepositoryInterface $repo,
    ) {
    }

    public function index()
    {
        $carBrands = $this->repo->index();
        return CarBrandResource::collection($carBrands);
    }
}
