@extends('admin::layouts.panel')

@section('title',__('country::country.countries_list'))
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
                        <li class="breadcrumb-item active">{{ __('country::country.countries_list') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('country::country.countries_list') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->canDo('countries.create'))
                        <div class="row mb-2">
                            <div class="col-12">
                                <a href="{{ route('admin.countries.create') }}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> {{ __('country::country.add_country') }}
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="countries_table" class="table table-centered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('country::country.id') }}</th>
                                <th>{{ __('country::country.name') }}</th>
                                <th>{{ __('country::country.locale') }}</th>
                                <th>{{ __('country::country.alpha2') }}</th>
                                <th>{{ __('country::country.currency') }}</th>
                                <th>{{ __('country::country.currency_code') }}</th>
                                <th>{{ __('country::country.currency_symbol') }}</th>
                                <th>{{ __('country::country.currency_decimals') }}</th>
                                <th>{{ __('country::country.currency_rate') }}</th>
                                <th>{{ __('country::country.calling_code') }}</th>
                                <th>{{ __('country::country.region_code') }}</th>
                                <th>{{ __('country::country.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            let table = $('#countries_table').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.countries.index') }}",
                "language": language,
                "pageLength": pageLength,
                "columns": [
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': false},
                ],
                "order": [[0, "desc"]],
                "drawCallback": function () {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                    $('#countries_table tr td:nth-child(2)').addClass('table-user');
                    $('#countries_table tr td:nth-child(12)').addClass('table-action');
                    delete_listener();
                }
            });

            table.on('childRow.dt', function (e, row) {
                delete_listener();
            });
        });
    </script>
@endsection
