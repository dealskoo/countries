<?php

namespace Dealskoo\Country\Http\Controllers\Admin;

use Dealskoo\Admin\Http\Controllers\Controller as AdminController;
use Illuminate\Http\Request;

class CountryController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->table($request);
        } else {
            return view('country::country.index');
        }
    }

    private function table(Request $request)
    {

    }

    public function show(Request $request, $id)
    {

    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }
}
