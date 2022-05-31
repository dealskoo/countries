<?php

namespace Dealskoo\Country\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Country extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $appends = ['flag_url'];

    protected $fillable = [
        'code',
        'name',
        'alpha2',
        'alpha3',
        'currency',
        'currency_code',
        'currency_sub_unit',
        'currency_symbol',
        'currency_decimals',
        'currency_rate',
        'flag',
        'calling_code',
        'region_code',
        'sub_region_code',
        'locale',
        'eea'
    ];

    protected $casts = [
        'eea' => 'boolean'
    ];

    public function getFlagUrlAttribute()
    {
        return empty($this->flag) ?
            '/vendor/country/images/flags/us.svg' :
            '/vendor/country/images/flags/' . Str::lower($this->flag) . '.svg';
    }

    public function setAlpha2Attribute($value)
    {
        $this->attributes['alpha2'] = Str::upper($value);
    }

    public function setAlpha3Attribute($value)
    {
        $this->attributes['alpha3'] = Str::upper($value);
    }

    public function setCurrencyCodeAttribute($value)
    {
        $this->attributes['currency_code'] = Str::upper($value);
    }

    public function toSearchableArray()
    {
        return $this->only([
            'code',
            'name',
            'alpha2',
            'alpha3',
            'currency',
            'currency_code',
            'currency_sub_unit',
            'currency_symbol',
            'currency_decimals',
            'currency_rate',
            'flag',
            'calling_code',
            'region_code',
            'sub_region_code',
            'locale',
            'eea'
        ]);
    }
}
