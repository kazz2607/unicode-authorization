@extends('layouts.app')

@section('content')
<div class="container container-tight py-4">
    <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark">
            <img src="{{ asset('assets/backend/img/static/logo.svg') }}" width="110" height="32" class="navbar-brand-image">
        </a>
    </div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">{{ __('Đặt Lại Mật Khẩu') }}</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3">
                    <label class="form-label">{{ __('Địa Chỉ Email') }}</label>
                    <input id="email" placeholder="Địa Chỉ Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        {{ __('Mật Khẩu') }}
                    </label>
                    <input id="password" placeholder="Mật Khẩu" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        {{ __('Nhập Lại Mật Khẩu') }}
                    </label>
                    <input id="password-confirm" placeholder="Nhập Lại Mật Khẩu" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Đặt Lại Mật Khẩu') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
