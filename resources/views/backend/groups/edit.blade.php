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
                    <div class="btn-list">
                        <a href="{{ route('admin.groups.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="fa-solid fa-list"></i>Danh sách nhóm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form method="POST" action="">
            @csrf
            <div class="row row-cards">

              @if(session('msg'))
                <div class="col-md-12">
                  <div class="alert alert-important alert-success alert-dismissible">
                    <i class="fa-solid fa-check"></i> {{ session('msg') }}
                  </div>
                </div>
              @endif

              @if($errors->any())
                <div class="col-md-12">
                  <div class="alert alert-important alert-danger alert-dismissible">
                    <i class="fa-solid fa-circle-exclamation"></i> Vui lòng kiểm tra lại dữ liệu nhập vào.
                  </div>
                </div>
              @endif

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label required">Tên Nhóm</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" placeholder="Vui lòng nhập họ tên..." value="{{old('name')  ?? $group->name }}">
                                @error('name')
                                    <div class="msg-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-3 col-form-label">Phân Quyền</label>
                            <div class="col">
                              Phân quyền
                            </div>
                          </div>
                        </div>
                        <div class="card-footer text-end">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                           <!-- Box Item -->
                          <div class="mb-3">
                            <label class="form-label">Kích hoạt nhóm</label>
                            <div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="{{old('status') ?? '1' }}" {{ $group->status == '1' ? 'checked':false}}>
                                <label class="form-check-label">Kích hoạt</label>
                              </div>
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="status" value="{{old('status') ?? '0' }}" {{ $group->status == '0' ? 'checked':false}}>
                                  <label class="form-check-label">Chưa kích hoạt</label>
                              </div>
                            </div>
                          </div>
                          <!-- End Box Item -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection

