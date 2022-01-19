<?php

namespace Dealskoo\Country\Http\Controllers\Admin;

use Carbon\Carbon;
use Dealskoo\Admin\Http\Controllers\Controller as AdminController;
use Dealskoo\Country\Models\Country;
use Illuminate\Http\Request;

class CountryController extends AdminController
{
    public function index(Request $request)
    {
        if (!$request->user()->canDo('countries.index')) {
            abort(403);
        }
        if ($request->ajax()) {
            return $this->table($request);
        } else {
            return view('country::country.index');
        }
    }

    private function table(Request $request)
    {
        $start = $request->input('start', 0);
        $limit = $request->input('length', 10);
        $keyword = $request->input('search.value');
        $columns = ['id', 'name', 'locale', 'alpha2', 'currency', 'currency_code', 'currency_symbol', 'currency_decimals', 'currency_rate', 'calling_code', 'region_code'];
        $column = $columns[$request->input('order.0.column', 0)];
        $desc = $request->input('order.0.dir', 'desc');
        $query = Country::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
            $query->orWhere('locale', 'like', '%' . $keyword . '%');
            $query->orWhere('alpha2', 'like', '%' . $keyword . '%');
            $query->orWhere('currency', 'like', '%' . $keyword . '%');
            $query->orWhere('currency_code', 'like', '%' . $keyword . '%');
            $query->orWhere('currency_symbol', 'like', '%' . $keyword . '%');
            $query->orWhere('currency_decimals', 'like', '%' . $keyword . '%');
            $query->orWhere('currency_rate', 'like', '%' . $keyword . '%');
            $query->orWhere('calling_code', 'like', '%' . $keyword . '%');
            $query->orWhere('region_code', 'like', '%' . $keyword . '%');
        }
        $query->orderBy($column, $desc);
        $count = $query->count();
        $countries = $query->skip($start)->take($limit)->get();
        $rows = [];
        $can_view = $request->user()->canDo('countries.show');
        $can_edit = $request->user()->canDo('countries.edit');
        $can_destroy = $request->user()->canDo('countries.destroy');
        foreach ($countries as $country) {
            $row = [];
            $row[] = $country->id;
            $row[] = $country->name;
            $row[] = $country->locale;
            $row[] = $country->alpha2;
            $row[] = $country->currency;
            $row[] = $country->currency_code;
            $row[] = $country->currency_symbol;
            $row[] = $country->currency_decimals;
            $row[] = $country->currency_rate;
            $row[] = $country->calling_code;
            $row[] = $country->region_code;
            $view_link = '';
            if ($can_view) {
                $view_link = '<a href="' . route('admin.countries.show', $country) . '" class="action-icon"><i class="mdi mdi-eye"></i></a>';
            }

            $edit_link = '';
            if ($can_edit) {
                $edit_link = '<a href="' . route('admin.countries.edit', $country) . '" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>';
            }
            $destroy_link = '';
            if ($can_destroy) {
                $destroy_link = '<a href="javascript:void(0);" class="action-icon delete-btn" data-table="countries_table" data-url="' . route('admin.countries.destroy', $country) . '"> <i class="mdi mdi-delete"></i></a>';
            }
            $row[] = $view_link . $edit_link . $destroy_link;
            $rows[] = $row;
        }
        return [
            'draw' => $request->draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $rows
        ];
    }

    public function show(Request $request, $id)
    {
        if (!$request->user()->canDo('countries.show')) {
            abort(403);
        }
        $country = Country::query()->findOrFail($id);
        return view('country::country.show', ['country' => $country]);
    }

    public function create(Request $request)
    {
        if (!$request->user()->canDo('countries.create')) {
            abort(403);
        }
        return view('country::country.create');
    }

    public function store(Request $request)
    {
        if (!$request->user()->canDo('countries.create')) {
            abort(403);
        }

    }

    public function edit(Request $request, $id)
    {
        if (!$request->user()->canDo('countries.edit')) {
            abort(403);
        }
        $country = Country::query()->findOrFail($id);
        return view('country::country.edit', ['country' => $country]);
    }

    public function update(Request $request, $id)
    {
        if (!$request->user()->canDo('countries.edit')) {
            abort(403);
        }
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->canDo('countries.destroy')) {
            abort(403);
        }

    }
}
