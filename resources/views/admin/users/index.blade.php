@extends('admin.layouts.master')

@push('libs-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.bootstrap5.min.css">
@endpush

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Danh sách thành viên') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">{{ __('Danh sách thành viên') }}</h2>
                    <x-link :href="route('admin.user.create')" class="btn btn-primary"><i class="ti ti-plus"></i>{{ __('Thêm thành viên') }}</x-link>
                </div>
                <div class="card-body">
                    <div class="table-responsive position-relative">
                        <x-admin.partials.toggle-column-datatable />
                        {{$dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width: 900px;'], true)}}
                    </div>
                </div>
        </div>
    </div>
@endsection

@push('libs-js')
<!-- button in datatable -->
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
@endpush

@push('custom-js')

{{ $dataTable->scripts() }}

@include('admin.users.scripts.datatable')
<script>
$(document).ready(function(){
    // define columns for the datatables
    columns = window.LaravelDataTables["userTable"].columns();
    toggleColumnsDatatable(columns);
});
</script>
@endpush
