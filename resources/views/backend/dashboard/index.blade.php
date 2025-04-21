@extends('backend.layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ $meta['title'] }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    {{-- <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                New view
                            </a>
                        </span>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="fa-solid fa-plus"></i>Create new report
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="row row-cards">
                        <!-- Item Block !-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <a href="{{ route('admin.mailers.index') }}" class="text-decoration-none">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <x-tabler-mail-up />
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    <h3 style="margin-bottom:5px">Thông báo bảng lương</h3>
                                                </div>
                                                <div class="text-secondary">
                                                    Chức năng gửi email thông báo bảng lương tháng.
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Item Block !-->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('css')
<link href="{{ asset('assets/backend/css/tabler-flags.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/backend/css/tabler-payments.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/backend/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
@endsection

@section('js')
<!-- Libs JS -->
<script src="{{ asset('assets/backend/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('assets/backend/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
<script src="{{ asset('assets/backend/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
<script src="{{ asset('assets/backend/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
<!-- Tabler Custom JS -->
<script src="{{ asset('assets/backend/js/tabler-custom.js') }}" defer></script>
@endsection
