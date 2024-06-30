<?php

namespace App\Repositories;

interface ReadonlyRepositoryInterface
{
    public function index(?array $params = array());
}
