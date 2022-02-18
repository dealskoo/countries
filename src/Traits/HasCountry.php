<?php

namespace Dealskoo\Country\Traits;

use Dealskoo\Country\Models\Country;

trait HasCountry
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
