<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarModelResource;
use App\Repositories\ReadonlyRepositoryInterface;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function __construct(
        private ReadonlyRepositoryInterface $repo,
    ) {
    }

    public function index()
    {
        $carModels = $this->repo->index();
        return CarModelResource::collection($carModels);
    }
}
