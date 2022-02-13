<?php

namespace Dealskoo\Country\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Dealskoo\Country\Models\Country;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $country = Country::query()->where('alpha2', \request(config('country.prefix')))->first();
        if (!$country) {
            abort(404);
        }
        App::setLocale($request->country()->locale);
        return $next($request);
    }
}
