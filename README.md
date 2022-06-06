# Country of [Dealskoo](https://www.dealskoo.com)

Country management package of [Dealskoo/admin](https://github.com/dealskoo/admin)

## Install

```base
$ composer require dealskoo\country
```

### Publish vendor

```base 
$ php artisan vendor:publish --provider="Dealskoo\Country\Providers\CountryServiceProvider" --tag=public
```

## Add Middleware

`App\Http\Kernel.php`

```php
    protected $routeMiddleware = [
        'locale' => \Dealskoo\Country\Http\Middleware\Localization::class,
    ];
```

## Add Exception

`App\Exceptions\Handler.php`

```php
public function register(){
    URL::defaults([config('country.prefix') => request()->country()->alpha2]);
    App::setLocale(request()->country()->locale);
}
```

## Support

- [Dealskoo](https://www.dealskoo.com)
- [Best Deals](https://www.dealskoo.com/best_deals)
- [Promo Codes](https://www.dealskoo.com/promo_codes)
