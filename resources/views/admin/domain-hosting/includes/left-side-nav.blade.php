<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('lte/dist/img/logo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ __('Domain & Hosting') }}</span>
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
                    <a href="{{ route('domain-hosting') }}" class="nav-link {{ isMenuActive('admin/domain-hosting') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item  {{ isMenuActive(['admin/domain','admin/customer-domain']) }}">
                    <a href="javascript:"
                       class="nav-link {{ isMenuActive(['admin/domain','admin/customer-domain']) }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            {{ __(' Domain Management')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('domain.index') }}"
                               class="nav-link {{ isMenuActive('admin/domain') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Domains')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer-domain.index') }}" class="nav-link {{ isMenuActive('admin/customer-domain') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Customers')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  {{ isMenuActive(['admin/hosting*','admin/customer-hosting']) }}">
                    <a href="javascript:"
                       class="nav-link {{ isMenuActive(['admin/hosting*','admin/customer-hosting']) }}">
                        <i class="nav-icon fas fa-cloud"></i>
                        <p>
                            {{ __('Hosting Management')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('hosting.index') }}"
                               class="nav-link {{ isMenuActive('admin/hosting') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Hosting')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer-hosting.index') }}"
                               class="nav-link  {{ isMenuActive('admin/customer-hosting') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Customers')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  {{ isMenuActive(['admin/provider*','admin/name-server*','admin/customer']) }}">
                    <a href="javascript:"
                       class="nav-link {{ isMenuActive(['admin/provider*','admin/name-server*','admin/customer']) }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{ __('Settings')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('provider.index') }}" class="nav-link  {{ isMenuActive('admin/provider') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Providers')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('name-server.index') }}"
                               class="nav-link  {{ isMenuActive('admin/name-server') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Name Server')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}"
                               class="nav-link {{ isMenuActive('admin/customer') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Customers')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
