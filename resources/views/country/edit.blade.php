@extends('admin::layouts.panel')

@section('title',__('country::country.edit_country'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('admin::admin.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('country::country.edit_country') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('country::country.edit_country') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.countries.update',$country) }}" method="post">
                        @csrf
                        @method('PUT')
                        @if(!empty(session('success')))
                            <div class="alert alert-success">
                                <p class="mb-0">{{ session('success') }}</p>
                            </div>
                        @endif
                        @if(!empty($errors->all()))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">{{ __('country::country.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                       value="{{ old('name',$country->name) }}" autofocus tabindex="1"
                                       placeholder="{{ __('country::country.name_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="code" class="form-label">{{ __('country::country.code') }}</label>
                                <input type="text" class="form-control" id="code" name="code" required
                                       value="{{ old('code',$country->code) }}" tabindex="2"
                                       placeholder="{{ __('country::country.code_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="alpha2" class="form-label">{{ __('country::country.alpha2') }}</label>
                                <input type="text" class="form-control" id="alpha2" name="alpha2" required
                                       value="{{ old('alpha2',$country->alpha2) }}" tabindex="3"
                                       placeholder="{{ __('country::country.alpha2_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="alpha3" class="form-label">{{ __('country::country.alpha3') }}</label>
                                <input type="text" class="form-control" id="alpha3" name="alpha3" required
                                       value="{{ old('alpha3',$country->alpha3) }}" tabindex="4"
                                       placeholder="{{ __('country::country.alpha3_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="currency"
                                       class="form-label">{{ __('country::country.currency') }}</label>
                                <input type="text" class="form-control" id="currency" name="currency" required
                                       value="{{ old('currency',$country->currency) }}" tabindex="5"
                                       placeholder="{{ __('country::country.currency_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="currency_code"
                                       class="form-label">{{ __('country::country.currency_code') }}</label>
                                <input type="text" class="form-control" id="currency_code" name="currency_code"
                                       required
                                       value="{{ old('currency_code',$country->currency_code) }}" tabindex="6"
                                       placeholder="{{ __('country::country.currency_code_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="currency_sub_unit"
                                       class="form-label">{{ __('country::country.currency_sub_unit') }}</label>
                                <input type="text" class="form-control" id="currency_sub_unit"
                                       name="currency_sub_unit" required
                                       value="{{ old('currency_sub_unit',$country->currency_sub_unit) }}" tabindex="7"
                                       placeholder="{{ __('country::country.currency_sub_unit_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="currency_symbol"
                                       class="form-label">{{ __('country::country.currency_symbol') }}</label>
                                <input type="text" class="form-control" id="currency_symbol"
                                       name="currency_symbol" required
                                       value="{{ old('currency_symbol',$country->currency_symbol) }}" tabindex="8"
                                       placeholder="{{ __('country::country.currency_symbol_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="currency_decimals"
                                       class="form-label">{{ __('country::country.currency_decimals') }}</label>
                                <input type="number" class="form-control" id="currency_decimals"
                                       name="currency_decimals" required
                                       value="{{ old('currency_decimals',$country->currency_decimals) }}" tabindex="9"
                                       placeholder="{{ __('country::country.currency_decimals_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="currency_rate"
                                       class="form-label">{{ __('country::country.currency_rate') }}</label>
                                <input type="number" class="form-control" id="currency_rate"
                                       name="currency_rate" required
                                       value="{{ old('currency_rate',$country->currency_rate) }}" tabindex="10"
                                       placeholder="{{ __('country::country.currency_rate_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="calling_code"
                                       class="form-label">{{ __('country::country.calling_code') }}</label>
                                <input type="text" class="form-control" id="calling_code"
                                       name="calling_code" required
                                       value="{{ old('calling_code',$country->calling_code) }}" tabindex="11"
                                       placeholder="{{ __('country::country.calling_code_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="region_code"
                                       class="form-label">{{ __('country::country.region_code') }}</label>
                                <input type="text" class="form-control" id="region_code"
                                       name="region_code" required
                                       value="{{ old('region_code',$country->region_code) }}" tabindex="12"
                                       placeholder="{{ __('country::country.region_code_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sub_region_code"
                                       class="form-label">{{ __('country::country.sub_region_code') }}</label>
                                <input type="text" class="form-control" id="sub_region_code"
                                       name="sub_region_code" required
                                       value="{{ old('sub_region_code',$country->sub_region_code) }}" tabindex="13"
                                       placeholder="{{ __('country::country.sub_region_code_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="locale"
                                       class="form-label">{{ __('country::country.locale') }}</label>
                                <input type="text" class="form-control" id="locale"
                                       name="locale" required
                                       value="{{ old('locale',$country->locale) }}" tabindex="14"
                                       placeholder="{{ __('country::country.locale_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="eea" name="eea"
                                           tabindex="15" @if($country->eea) checked @endif
                                           value="1">
                                    <label for="eea"
                                    class="form-check-label">{{ __('country::country.eea') }}</label>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2" tabindex="16"><i
                                    class="mdi mdi-content-save"></i> {{ __('admin::admin.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
