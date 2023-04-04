<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @section('header')
        @include('admin.layouts.styles')
    @show
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        @if(Auth::user()->type==1)
            <a href="{{  route('admin.home') }}" class="brand-link">
                @else
                    <a href="{{route('admin.cards.call-center.index')}}" class="brand-link">
                        @endif
                        <img src="{{ asset('header-logo1.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
                             style="opacity: .8">
                        <span class="brand-text font-weight-light">{{ $setting->name }}</span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ auth()->user()->avatar_url }}" onerror="this.onerror=null; this.src='{{ asset('themes/AdminLTE/dist/img/avatar5.png') }}';" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="{{  route('admin.home') }}" class="d-block">{{ auth()->user()->full_name }}</a>
                </div>
            </div> -->

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm"
                                data-widget="treeview" role="menu" data-accordion="false">
                                @hasanyrole('Super Admin')
                                <li class="nav-item">
                                    <a href="{{  route('admin.home') }}"
                                       class="nav-link @if(request()->is('admin/home')) active @endif">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                @endhasanyrole
                                @hasanyrole('Bank')
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.all.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/all*')) active @endif">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>Card Management</p>
                                    </a>
                                </li>
                                @endhasanyrole
                                @hasanyrole('Super Admin')
                                <li class="nav-item">
                                    <a href="{{ route('admin.callcenter.callcenter.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Call Centers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.driver.driver.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Drivers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.barcode.scan.index') }}"
                                       class="nav-link @if(request()->is('admin/barcode/scan*')) active @endif">
                                        <i class="nav-icon fas fa-barcode"></i>
                                        <p>Scan Barcode</p>
                                    </a>
                                </li>

                                <li class="nav-header">CARD MANAGEMENT</li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.newly-arrived.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/newly-arrived*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Newly arrived</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.unassigned.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/unassigned*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Unassigned</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.assign-to-agent.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/assign-to-agent*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assigned to agent</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.out-for-delivery.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/out-for-delivery*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Out for delivery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.assign-to-driver.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/assign-to-driver*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assigned to driver</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.return-to-bank.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/return-to-bank*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Return to bank</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.undelivered.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/undelivered*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Undelivered</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cards.delivered.index') }}"
                                       class="nav-link @if(request()->is('admin/cards/delivered*')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Delivered</p>
                                    </a>
                                </li>

                                <li class="nav-header">MASTERS</li>
                                {{--                        <li class="nav-item">--}}
                                {{--                            <a href="{{ route('admin.masters.governorates.index') }}" class="nav-link @if(request()->is('admin/masters/governorates*')) active @endif">--}}
                                {{--                                <i class="nav-icon fas fa-map-marker-alt"></i>--}}
                                {{--                                <p>Governorates</p>--}}
                                {{--                            </a>--}}
                                {{--                        </li>--}}
                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a href="{{ route('admin.masters.areas.index') }}"--}}
                                {{--                                       class="nav-link @if(request()->is('admin/masters/areas*')) active @endif">--}}
                                {{--                                        <i class="nav-icon fas fa-map-marker-alt"></i>--}}
                                {{--                                        <p>Areas</p>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                                <li class="nav-item">
                                    <a href="{{ route('admin.masters.block.index') }}"
                                       class="nav-link @if(request()->is('admin/masters/block*')) active @endif">
                                        <i class="nav-icon fas fa-map-marker-alt"></i>
                                        <p>Blocks</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.masters.status.index') }}"
                                       class="nav-link @if(request()->is('admin/masters/status*')) active @endif">
                                        <i class="nav-icon fas fa-check"></i>
                                        <p>Status</p>
                                    </a>
                                </li>
                            <!-- <li class="nav-item">
                                    <a href="{{ route('admin.settings.edit', ['setting' => 1]) }}" class="nav-link @if(request()->is('admin/settings/*')) active @endif">
                                        <i class="nav-icon fas fa-cog"></i>
                                        <p>Settings</p>
                                    </a>
                                </li> -->
                                @endhasanyrole
                                <li class="nav-header">MY ACCOUNT</li>
                            <!-- <li class="nav-item">
                        <a href="{{ route('admin.my-profile.edit', [auth()->user()->id]) }}" class="nav-link @if(request()->is('admin/my-profile/*')) active @endif">
                            <i class="nav-icon fas fa-user"></i>
                            <p>My Profile</p>
                        </a>
                    </li> -->
                                <li class="nav-item">
                                    <a href="{{ route('admin.change-password.edit', [auth()->user()->id]) }}"
                                       class="nav-link @if(request()->is('admin/change-password/*')) active @endif">
                                        <i class="nav-icon fas fa-key"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.logout') }}" class="nav-link"
                                       onclick="event.preventDefault(); $('#logout-form').submit();">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>Logout</p>
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
    </aside>

    <div>
        @yield('content')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer text-sm">
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ now()->year }} <a href="#">{{ $setting->name }}</a>.</strong> All rights reserved.

        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <strong>{{ $setting->version }}</strong>
        </div>
    </footer>
</div>

@section('footer')
    @include('admin.layouts.scripts')
@show
</body>

</html>
