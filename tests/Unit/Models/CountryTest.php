<?php

namespace Dealskoo\Country\Tests\Unit\Models;

use Dealskoo\Country\Models\Country;
use Dealskoo\Country\Tests\TestCase;
use Illuminate\Support\Str;
use function PHPUnit\Framework\assertEquals;

class CountryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testDefaultFlagUrl()
    {
        $country = new Country();
        assertEquals('/vendor/country/images/flags/us.svg', $country->flag_url);
    }

    public function testFlagUrl()
    {
        $flag = 'en';
        $country = new Country();
        $country->flag = $flag;
        assertEquals('/vendor/country/images/flags/' . $flag . '.svg', $country->flag_url);
    }

    public function testAlpha2()
    {
        $alpha2 = 'us';
        $country = new Country();
        $country->alpha2 = $alpha2;
        assertEquals(Str::upper($alpha2), $country->alpha2);
    }

    public function testAlpha3()
    {
        $alpha3 = 'usa';
        $country = new Country();
        $country->alpha3 = $alpha3;
        assertEquals(Str::upper($alpha3), $country->alpha3);
    }

    public function testCurrencyCode()
    {
        $currency_code = 'usd';
        $country = new Country();
        $country->currency_code = $currency_code;
        assertEquals(Str::upper($currency_code), $country->currency_code);
    }
}
