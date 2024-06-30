<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_model_id', 'year', 'kmage', 'color'];

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function () {
            Cache::tags('cars')->flush();
        });
        static::deleted(function () {
            Cache::tags('cars')->flush();
        });
    }
}
