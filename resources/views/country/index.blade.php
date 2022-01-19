@extends('admin::layouts.panel')

@section('title',__('seller::seller.sellers_list'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('seller.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('seller::seller.sellers_list') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('seller::seller.sellers_list') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sellers_table" class="table table-centered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('seller::seller.id') }}</th>
                                <th>{{ __('seller::seller.name') }}</th>
                                <th>{{ __('seller::seller.slug') }}</th>
                                <th>{{ __('seller::seller.email') }}</th>
                                <th>{{ __('seller::seller.country') }}</th>
                                <th>{{ __('seller::seller.created_at') }}</th>
                                <th>{{ __('seller::seller.updated_at') }}</th>
                                <th>{{ __('seller::seller.action') }}</th>
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
            $('#sellers_table').dataTable({
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
                    {'orderable': false},
                ],
                "order": [[0, "desc"]],
                "drawCallback": function () {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                    $('#sellers_table tr td:nth-child(2)').addClass('table-user');
                    $('#sellers_table tr td:nth-child(5)').addClass('table-action');
                    $('.delete-btn').on('click', function (e) {
                        let table = $('#' + $(this).data('table'));
                        let url = $(this).data('url');
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                table.DataTable().ajax.reload();
                            }
                        });
                    });
                }
            })
        });
    </script>
@endsection
