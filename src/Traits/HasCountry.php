<?php

namespace Dealskoo\Country\Traits;

trait HasCountry
{
    public function country()
    {
        return $this->belongsTo(\Dealskoo\Country\Models\Country::class);
    }
}
