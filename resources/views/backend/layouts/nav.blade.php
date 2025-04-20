<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <!-- Navigation Item Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa-solid fa-house"></i>Dashboard
                        </a>
                    </li>
                    <!-- End Navigation Item Menu -->
                    @can('users')
                    <!-- Navigation Item Menu -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <i class="fa-solid fa-user"></i>Thành viên
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                          Quản lý thành viên
                        </a>
                        @can('users.add')
                        <a class="dropdown-item" href="{{ route('admin.users.add') }}">
                          Thêm thành viên
                        </a>
                        @endcan
                      </div>
                    </li>
                    <!-- End Navigation Item Menu -->
                    @endcan
                    @can('groups')
                    <!-- Navigation Item Menu -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <i class="fa-solid fa-users"></i>Nhóm thành viên
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.groups.index') }}">
                          Quản lý nhóm thành viên
                        </a>
                        @can('groups.add')
                        <a class="dropdown-item" href="{{ route('admin.groups.add') }}">
                          Thêm nhóm thành viên
                        </a>
                        @endcan
                      </div>
                    </li>
                    <!-- End Navigation Item Menu -->
                    @endcan
                    @can('posts')
                    <!-- Navigation Item Menu -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <i class="fa-solid fa-newspaper"></i>Bài viết
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.posts.index') }}">
                          Quản lý bài viết
                        </a>
                        @can('posts.add')
                        <a class="dropdown-item" href="{{ route('admin.posts.add') }}">
                          Thêm bài viết
                        </a>
                        @endcan
                      </div>
                    </li>
                    <!-- End Navigation Item Menu -->
                    @endcan

                    @can('mailers')
                    <!-- Navigation Item Menu -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <i class="fa-solid fa-newspaper"></i>Quản lý mailer
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.mailers.index') }}">
                          Quản lý mailer
                        </a>
                        @can('mailers.add')
                        <a class="dropdown-item" href="{{ route('admin.mailers.add') }}">
                          Thêm mailer
                        </a>
                        @endcan
                      </div>
                    </li>
                    <!-- End Navigation Item Menu -->
                    @endcan
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="./" method="get" autocomplete="off" novalidate>
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                            </span>
                            <input type="text" value="" class="form-control" placeholder="Search…"
                                aria-label="Search in website">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
