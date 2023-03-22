<header class="navbar navbar-expand-md navbar-dark navbar-light d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row order-md-last">
            <a href="#" class="nav-link px-0 hide-theme-light" title="" data-bs-toggle="tooltip"
               data-bs-placement="bottom" data-bs-original-title="Enable light mode">
                <i class="ti ti-bell"></i>
            </a>
{{--            <div class="nav-item dropdown d-none d-md-flex me-3">--}}
{{--                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"--}}
{{--                   aria-label="Show notifications">--}}
{{--                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"--}}
{{--                         stroke-linejoin="round">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                        <path--}}
{{--                            d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>--}}
{{--                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>--}}
{{--                    </svg>--}}
{{--                    <span class="badge bg-red"></span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur--}}
{{--                            exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet--}}
{{--                            debitis et magni maxime necessitatibus ullam.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{Auth::user()->profile_picture}})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{Auth::user()->name}}</div>
                        <div class="mt-1 small text-muted">{{__('common.coach')}}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item disabled">{{__('common.set_status')}}</a>
                    <a href="#" class="dropdown-item disabled">{{__('common.profile')}}</a>
                    <a href="#" class="dropdown-item disabled">{{__('common.profile')}}</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item disabled">{{__('common.settings')}}</a>
                    {!! Form::open(['route' => 'logout', 'method' => 'POST']) !!}
                    <button class="dropdown-item" type="submit">{{__('common.logout')}}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div>
                {{--                <form action="." method="get">--}}
                {{--                    <div class="input-icon">--}}
                {{--                  <span class="input-icon-addon">--}}
                {{--                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->--}}
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>--}}
                {{--                  </span>--}}
                {{--                        <input type="text" class="form-control" placeholder="Search…" aria-label="Search in website">--}}
                {{--                    </div>--}}
                {{--                </form>--}}
            </div>
        </div>
    </div>
</header>
