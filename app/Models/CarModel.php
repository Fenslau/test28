<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class CarModel extends Model
{
    use HasFactory;

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function carBrand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function () {
            Cache::tags('models')->flush();
        });
        static::deleted(function () {
            Cache::tags('models')->flush();
        });
    }
}
