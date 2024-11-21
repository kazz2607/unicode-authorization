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
                        @can('create', App\Model\Posts::class )
                        <a href="{{ route('admin.posts.add') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="fa-solid fa-plus"></i>Thêm bài viết
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            
            @if(session('msg'))
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="alert alert-important alert-success alert-dismissible">
                        <i class="fa-solid fa-check"></i> {{ session('msg') }}
                    </div>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="alert alert-important alert-danger alert-dismissible">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
                    </div>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-secondary">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="text" class="form-control form-control" value="8" size="3" aria-label="Invoices count">
                            </div>
                            entries
                        </div>
                        <div class="ms-auto text-secondary">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" class="form-control form-control" aria-label="Search invoice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">
                                    <input class="form-check-input m-0 align-middle" type="checkbox">
                                </th>
                                <th class="w-1">STT</th>
                                <th>Tiêu Đề</th>
                                {{-- <th>Chuyên Mục</th> --}}
                                <th>Người Đăng</th>
                                <th>Ngày Tạo</th>
                                <th>Trình trạng</th>
                                @can('posts.edit')
                                <th class="w-2">Sửa</th>
                                @endcan
                                @can('posts.delete')
                                <th class="w-2">Xoá</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if($lists->count()>0)
                                @foreach ($lists as $key => $item)
                                <tr>
                                    <td><input class="form-check-input align-middle" type="checkbox"></td>
                                    <td><span class="text-secondary">{{ $key + 1 }}</span></td>
                                    <td>
                                        <a href="{{route('admin.posts.edit', $item)}}" class="text-reset">{{ $item->title }}</a>
                                    </td>
                                    {{-- <td>Chuyên Mục</td> --}}
                                    <td>{{ !empty($item->postBy->name) ? $item->postBy->name : false }}</td>
                                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge bg-success"></span> Kích hoạt
                                        @else
                                            <span class="badge bg-danger"></span> Chưa kích hoạt
                                        @endif
                                    </td>
                                    @can('posts.edit')
                                    <td>
                                        <a href="{{route('admin.posts.edit', $item)}}" class="btn">Chỉnh sửa</a> 
                                    </td>
                                    @endcan
                                    @can('posts.delete')
                                    <td>
                                        <a onclick="return confirm('Bạn có chắc chắn ?')" href="{{route('admin.posts.delete', $item)}}" class="btn">Xoá</a>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    Pagination
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Libs JS -->
    <script src="{{ asset('assets/backend/libs/list.js/dist/list.min.js?') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const list = new List('table-default', {
                sortClass: 'table-sort',
                listClass: 'table-tbody',
                valueNames: ['sort-name', 'sort-type', 'sort-city', 'sort-score',
                    {
                        attr: 'data-date',
                        name: 'sort-date'
                    },
                    {
                        attr: 'data-progress',
                        name: 'sort-progress'
                    },
                    'sort-quantity'
                ]
            });
        })
    </script>
@endsection
