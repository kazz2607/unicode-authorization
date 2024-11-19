<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <!-- Navigation Item Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <i class="fa-solid fa-house"></i>
                            </span>
                            <span class="nav-link-title">
                              Home
                            </span>
                        </a>
                    </li>
                    <!-- End Navigation Item Menu -->
                    <!-- Navigation Item Menu -->
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <i class="fa-solid fa-gear"></i>
                            </span>
                            <span class="nav-link-title">
                                Layout
                            </span>
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">
                            Documentation
                          </a>
                          <a class="dropdown-item" href="#">
                            Documentation
                          </a>
                          <a class="dropdown-item" href="#">
                            Documentation
                          </a>
                          <a class="dropdown-item" href="#">
                            Documentation
                          </a>
                        </div>
                    </li>
                    <!-- End Navigation Item Menu -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                          <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="nav-link-title">
                          Help
                        </span>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">
                          Documentation
                        </a>
                        <a class="dropdown-item" href="#">
                          Changelog
                        </a>
                        <a class="dropdown-item" href="#">
                          Source code
                        </a>
                        <a class="dropdown-item text-pink" href="#" target="_blank" rel="noopener">
                          <i class="fa-regular fa-heart"></i> Sponsor project!
                        </a>
                      </div>
                    </li>
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
