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
                            {{__('Dashboard')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item  {{ request()->is('admin/religion*') || request()->is('admin/blood-group*') || request()->is('admin/marital-status*') || request()->is('admin/gender*') ? 'nav-item active menu-open' : null }}">
                    <a href="javascript:"
                       class="nav-link {{ request()->is('admin/religion*') || request()->is('admin/blood-group*')  || request()->is('admin/marital-status*') || request()->is('admin/gender*') ? 'nav-link active menu-open' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            {{ __('Setting')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('religion.index') }}"
                               class="nav-link  {{ request()->is('admin/religion') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Religion')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blood-group.index') }}"
                               class="nav-link  {{ request()->is('admin/blood-group') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Blood Group')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('marital-status.index') }}"
                               class="nav-link  {{ request()->is('admin/marital-status') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Marital Status')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gender.index') }}"
                               class="nav-link  {{ request()->is('admin/gender') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Gender')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
