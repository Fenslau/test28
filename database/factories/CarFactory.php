<?php

namespace Database\Factories;

use App\Models\CarBrand;
use App\Models\CarModel;
use Faker\Provider\FakeCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new FakeCar($this->faker));
        $vehicleData = $this->faker->vehicleArray;
        $carBrand = CarBrand::firstOrCreate(['title' => $vehicleData['brand']]);
        $carModel = CarModel::firstOrCreate(['title' => $vehicleData['model'], 'car_brand_id' => $carBrand->id]);
        return [
            'year' => $this->faker->biasedNumberBetween(1990, date('Y'), 'sqrt'),
            'kmage' => $this->faker->numberBetween(0, 999999),
            'color' => $this->faker->colorName,
            'car_model_id' => $carModel->id,
        ];
    }
}
