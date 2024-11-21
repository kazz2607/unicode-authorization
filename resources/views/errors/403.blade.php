@extends('backend.layouts.app')

@section('content')
    <!-- Page body -->
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
              <div class="img">
                <img src="{{ asset('assets/backend/img/static/403-error.png') }}" width="350" alt="403">
              </div>
              <p class="empty-title">Bạn không có quyền truy cập</p>
              <p class="empty-subtitle text-secondary">
                We are sorry but the page you are looking for was not found
              </p>
              <div class="empty-action">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left"></i>Go To Dashboard
                </a>
              </div>
            </div>
          </div>
    </div>
@endsection

