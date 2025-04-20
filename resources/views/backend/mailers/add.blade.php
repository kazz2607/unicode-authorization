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
                        <a href="{{ route('admin.mailers.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="fa-solid fa-list"></i>Danh sách mailers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form method="POST" action="{{ route('admin.mailers.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="row row-cards">

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
                            <label class="col-3 col-form-label required">Tiêu Đề</label>
                            <div class="col">
                                <input type="text" class="form-control" name="title" placeholder="Vui lòng nhập tiêu đề..." value="{{old('title') }}">
                                @error('title')
                                    <div class="msg-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Nội Dung</label>
                            <div class="col">
                                <textarea rows="10" class="form-control" name="content" placeholder="Vui lòng nhập nội dung..." value="{{old('content')}}">{{old('content')}}</textarea>
                                @error('content')
                                    <div class="msg-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-3 col-form-label required">File</label>
                            <div class="col">
                            <input type="file" class="form-control" name="file" placeholder="Vui lòng upload file ..." value="{{old('file') }}">
                            @error('file')
                                <div class="msg-error">
                                    {{ $message }}
                                </div>
                            @enderror
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
                            <label class="form-label">Kích hoạt bài viết</label>
                            <div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="1" {{old('status') == '1' ? 'checked':'checked'}}>
                                <label class="form-check-label">Kích hoạt</label>
                              </div>
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="status" value="0" {{old('status') == '0' ? 'checked':false}}>
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

