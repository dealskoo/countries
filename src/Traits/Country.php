<?php

namespace Dealskoo\Country\Traits;

trait Country
{
    public function country()
    {
        return $this->belongsTo(\Dealskoo\Country\Models\Country::class);
    }
}
