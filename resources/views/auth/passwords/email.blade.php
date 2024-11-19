@extends('layouts.app')

@section('content')
<div class="container container-tight py-4">
    <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark">
            <img src="{{ asset('assets/backend/img/static/logo.svg') }}" width="110" height="32" class="navbar-brand-image">
        </a>
    </div>
    <form class="card card-md" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h2 class="card-title text-center mb-4">{{ __('Quên Mật Khẩu') }}</h2>
            <p class="text-secondary mb-4">
                Nhập địa chỉ email của bạn, mật khẩu sẽ được đặt lại và gửi tới email của bạn.
            </p>
            <div class="mb-3">
                <label class="form-label">{{ __('Địa Chỉ Email') }}</label>
                <input id="email" placeholder="Địa Chỉ Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fa-regular fa-envelope"></i> {{ __('Gửi Liên Kết Đặt Lại Mật Khẩu') }}
            </button>
            </div>
      </div>
    </form>
  </div>
@endsection
