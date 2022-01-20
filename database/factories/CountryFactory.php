<?php

namespace Database\Factories\Dealskoo\Country\Models;

use Dealskoo\Country\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition()
    {
        return [
            'code' => $this->faker->countryCode(),
            'name' => $this->faker->country(),
            'alpha2' => $this->faker->countryCode(),
            'alpha3' => $this->faker->countryISOAlpha3(),
            'currency' => $this->faker->currencyCode(),
            'currency_code' => $this->faker->currencyCode(),
            'currency_sub_unit' => $this->faker->currencyCode(),
            'currency_symbol' => $this->faker->currencyCode(),
            'currency_decimals' => $this->faker->biasedNumberBetween(0, 2),
            'currency_rate' => $this->faker->randomFloat(2, 0, 100),
            'flag' => $this->faker->countryCode(),
            'calling_code' => $this->faker->biasedNumberBetween(0, 10000) . '',
            'region_code' => $this->faker->biasedNumberBetween(0, 10000) . '',
            'sub_region_code' => $this->faker->biasedNumberBetween(0, 10000) . '',
            'locale' => $this->faker->locale(),
            'eea' => true
        ];
    }
}
