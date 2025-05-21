<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>@yield('page-title', 'Dashboard') | Gestão de Chamados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema de Gestão de Chamados" name="description" />
    <meta content="Seu Nome/Empresa" name="author" />

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    @vite(['resources/css/app.css'])

    @livewireStyles

    <script src="{{ asset('assets/js/head.js') }}"></script>

</head>

<body>

    <div id="wrapper">

        <div class="app-menu">

            <div class="logo-box">
                <a href="{{ route('home') }}" class="logo-light">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>
                <a href="{{ route('home') }}" class="logo-dark">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                </a>
            </div>

            <div class="scrollbar">

                <div class="user-box text-center">
                    <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block" data-bs-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">
                            <a href="javascript:void(0);" class="dropdown-item notify-item"><i class="fe-user me-1"></i><span>My Account</span></a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item"><i class="fe-settings me-1"></i><span>Settings</span></a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item"><i class="fe-lock me-1"></i><span>Lock Screen</span></a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item"><i class="fe-log-out me-1"></i><span>Logout</span></a>
                        </div>
                    </div>
                    <p class="text-muted mb-0">Admin Head</p>
                </div>

                <ul class="menu">
                    <li class="menu-title">Navigation</li>

                    <li class="menu-item">
                        <a href="{{ route('categories.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="grid"></i></span>
                            <span class="menu-text"> Categorias </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('tickets.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="clipboard"></i></span>
                            <span class="menu-text"> Chamados </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#menuDashboards" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i data-feather="airplay"></i></span>
                            <span class="menu-text"> Dashboards </span>
                            <span class="badge bg-success rounded-pill ms-auto">4</span>
                        </a>
                        <div class="collapse" id="menuDashboards">
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="{{ route('home') }}" class="menu-link"><span class="menu-text">Dashboard Principal</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a href="#menuTickets" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i data-feather="aperture"></i></span>
                            <span class="menu-text"> Tickets </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuTickets">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="{{ route('tickets.index') }}" class="menu-link">
                                        <span class="menu-text">Lista de Chamados</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="content-page">
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-1">
                        <div class="logo-box">
                            <a href="{{ route('home') }}" class="logo-light">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                            </a>
                            <a href="{{ route('home') }}" class="logo-dark">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
                            </a>
                        </div>
                        <button class="button-toggle-menu"><i class="mdi mdi-menu"></i></button>
                        <ul class="topbar-menu d-flex align-items-center">
                            <li class="app-search dropdown me-3 d-none d-lg-block">
                                <form>
                                    <input type="search" class="form-control rounded-pill" placeholder="Search..." id="top-search">
                                    <span class="fe-search search-icon font-16"></span>
                                </form>
                            </li>
                            <li class="d-none d-md-inline-block"><a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen"><i class="fe-maximize font-22"></i></a></li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fe-bell font-22"></i>
                                    <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                    <div class="px-1" style="max-height: 300px;" data-simplebar>
                                        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                            <div class="card-body">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                                    <span class="ms-1 d-none d-md-inline-block">Geneva <i class="mdi mdi-chevron-down"></i></span>
                                </a>
                            </li>
                            <li><a class="nav-link waves-effect waves-light" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas"><i class="fe-settings font-22"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">@yield('page-title', 'Dashboard')</h4>
                             
                                <div class="page-title-right">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- **ÁREA PRINCIPAL DE CONTEÚDO DINÂMICO** --}}
                    @yield('content')

                </div> </div> <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div><script>document.write(new Date().getFullYear())</script> © Ubold - <a href="https://coderthemes.com/" target="_blank">Coderthemes.com</a></div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            </div>
        </div>
    <div class="offcanvas offcanvas-end right-bar" tabindex="-1" id="theme-settings-offcanvas">

    <div class="offcanvas-body p-3 h-100" data-simplebar>
            <div class="tab-content pt-0">
                <div class="tab-pane" id="chat-tab" role="tabpanel">
                    <h6 class="fw-medium mt-2 text-uppercase">Group Chats</h6>
                    <div>
                        <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-success"></i><span class="mb-0 mt-1">App Development</span>
                        </a>
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('assets/images/users/user-10.jpg') }}" class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="overflow-hidden"><h6 class="mt-0 mb-1 font-14">Andrew Mackie</h6><div class="font-13 text-muted"><p class="mb-0 text-truncate">It will seem like simplified English.</p></div></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane" id="tasks-tab" role="tabpanel"></div>
                <div class="tab-pane active" id="settings-tab" role="tabpanel"></div>
            </div>
        </div>
        <div class="offcanvas-footer border-top py-2 px-2 text-center">
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-light w-50" id="reset-layout">Reset</button>
                <a href="https://1.envato.market/uboldadmin" class="btn btn-danger w-50" target="_blank"><i class="mdi mdi-basket me-1"></i> Buy</a>
            </div>
        </div>
    </div>


    @vite(['resources/js/app.js'])

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/dashboard-1.init.js') }}"></script>

    @livewireScripts

</body>
</html>