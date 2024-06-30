<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Cache;

class CarBrand extends Model
{
    use HasFactory;

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function cars(): HasManyThrough
    {
        return $this->hasManyThrough(Car::class, CarModel::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function () {
            Cache::tags('brands')->flush();
        });
        static::deleted(function () {
            Cache::tags('brands')->flush();
        });
    }
}
