<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('lte/dist/img/logo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WPM</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('home') }}" class="nav-link  {{ request()->is('dashboard') ? 'nav-link active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item  {{ request()->is('admin/leave-category*') || request()->is('admin/day*')  || request()->is('admin/leave*') || request()->is('admin/earn-leave*')  ? 'nav-item active menu-open' : null }}">
                    <a href="javascript:"
                       class="nav-link {{ request()->is('admin/leave-category*') || request()->is('admin/day*')  || request()->is('admin/leave*') || request()->is('admin/earn-leave*')  ? 'nav-link active menu-open' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            {{ __('Leave Management')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('leave-category.index') }}"
                               class="nav-link  {{ request()->is('admin/leave-category*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Leave Category')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('day.index') }}"
                               class="nav-link  {{ request()->is('admin/day*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Days')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('leave.index') }}"
                               class="nav-link  {{ request()->is('admin/leave') || request()->is('admin/leave/*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Leave')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('earn-leave.index') }}"
                               class="nav-link  {{ request()->is('admin/earn-leave*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Earn Leave')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
