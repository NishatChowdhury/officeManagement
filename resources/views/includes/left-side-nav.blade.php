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
                    <a href="{{ route('home') }}" class="nav-link {{ isMenuActive('admin/domain-hosting') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item  {{ request()->is('admin/provider*') || request()->is('admin/domain*') || request()->is('admin/hosting*') || request()->is('admin/customer*') || request()->is('admin/customer-hosting*') || request()->is('admin/customer-domain*') || request()->is('admin/name-server*') || request()->is('admin/renew*') ? 'nav-item active menu-open' : null }}">
                    <a href="javascript:"
                       class="nav-link {{ request()->is('admin/provider*') || request()->is('admin/domain*') || request()->is('admin/hosting*') || request()->is('admin/customer*') || request()->is('admin/customer-hosting*') || request()->is('admin/customer-domain*') || request()->is('admin/name-server*') || request()->is('admin/renew*') ? 'nav-link active menu-open' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            {{ __('Domain/Hosting')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('provider.index') }}"
                               class="nav-link  {{ request()->is('admin/provider') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Providers')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('domain.index') }}"
                               class="nav-link  {{ request()->is('admin/domain') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Domains')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('hosting.index') }}"
                               class="nav-link  {{ request()->is('admin/hosting') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Hostings')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}"
                               class="nav-link  {{ request()->is('admin/customer') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Customers')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer-hosting.index') }}"
                               class="nav-link  {{ request()->is('admin/customer-hosting') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Customers Hosting')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer-domain.index') }}"
                               class="nav-link  {{ request()->is('admin/customer-domain') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Customers Domain')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('name-server.index') }}"
                               class="nav-link  {{ request()->is('admin/name-server') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Name Server')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('renew.index') }}"
                               class="nav-link  {{ request()->is('admin/renew') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Renew')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  {{ request()->is('admin/religion*') || request()->is('admin/blood-group*') || request()->is('admin/marital-status*') ? 'nav-item active menu-open' : null }}">
                    <a href="javascript:"
                       class="nav-link {{ request()->is('admin/religion*') || request()->is('admin/blood-group*')  || request()->is('admin/marital-status*') ? 'nav-link active menu-open' : null }}">
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
                <li class="nav-item  {{ request()->is('admin/employee*') || request()->is('admin/professional-certificate') || request()->is('admin/card') || request()->is('admin/education*') || request()->is('admin/academic-result*') || request()->is('admin/employee-academic*')   ? 'nav-item active menu-open' : null }}">
                    <a href="javascript:"
                       class="nav-link {{ request()->is('admin/religion*') || request()->is('admin/professional-certificate') || request()->is('admin/card') || request()->is('admin/education*') || request()->is('admin/academic-result*') || request()->is('admin/employee-academic*')   ? 'nav-link active menu-open' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            {{ __('Employee Management')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employee.index') }}"
                               class="nav-link  {{ request()->is('admin/employee') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Employee')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('professional-certificate.index') }}"
                               class="nav-link  {{ request()->is('admin/professional-certificate') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Professional Certificate')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('card.index') }}"
                               class="nav-link  {{ request()->is('admin/card') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Card')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('education.index') }}"
                               class="nav-link  {{ request()->is('admin/education') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Education')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academic-result.index') }}"
                               class="nav-link  {{ request()->is('admin/academic-result') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Academic Result')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  {{ request()->is('admin/shift*') || request()->is('admin/designation*') || request()->is('admin/calendar*') || request()->is('admin/calendar-event*') || request()->is('admin/department*') || request()->is('admin/status')  ? 'nav-item active menu-open' : null }}">
                    <a href="javascript:"
                       class="nav-link {{ request()->is('admin/shift*') || request()->is('admin/designation*') || request()->is('admin/calendar*') || request()->is('admin/calendar-event*') || request()->is('admin/department*') || request()->is('admin/status') ? 'nav-link active menu-open' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            {{ __('Office Setup')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('shift.index') }}"
                               class="nav-link  {{ request()->is('admin/shift') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Shift')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('designation.index') }}"
                               class="nav-link  {{ request()->is('admin/designation') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Designation')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('department.index') }}"
                               class="nav-link  {{ request()->is('admin/department') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Department')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('status.index') }}"
                               class="nav-link  {{ request()->is('admin/status') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Status')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('calendar.index') }}"
                               class="nav-link  {{ request()->is('admin/calendar') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Calendar')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('calendar-event.index') }}"
                               class="nav-link  {{ request()->is('admin/calendar-event') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Calendar Events')}}</p>
                            </a>
                        </li>
                    </ul>
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
                               class="nav-link  {{ request()->is('admin/leave-category') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Leave Category')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('day.index') }}"
                               class="nav-link  {{ request()->is('admin/day') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Days')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('leave.index') }}"
                               class="nav-link  {{ request()->is('admin/leave') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Leave')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('earn-leave.index') }}"
                               class="nav-link  {{ request()->is('admin/earn-leave') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Earn Leave')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('admin/coa*') || request()->is('admin/journals*') || request()->is('admin/journal/classic*') || request()->is('admin/ledger*') || request()->is('admin/trial-balance*') || request()->is('admin/profit-n-loss*') || request()->is('admin/balance-sheet*') ? 'nav-item active menu-open' : null }}">
                    <a href="javascript:" class="nav-link {{ request()->is('admin/coa/*') || request()->is('admin/journals*') || request()->is('admin/journal/classic*') || request()->is('admin/ledger*') || request()->is('admin/trial-balance*') || request()->is('admin/profit-n-loss*') || request()->is('admin/balance-sheet*') ? 'nav-item active menu-open' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            {{__('Accounts Management')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coa.index') }}" class="nav-link  {{ request()->is('admin/coa') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__ ('Chart of Accounts') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('journals.index') }}" class="nav-link  {{ request()->is('admin/journals') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__ ('Journal')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('journals.classic') }}" class="nav-link  {{ request()->is('admin/journal/classic') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Journal Classic')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts.ledger') }}" class="nav-link  {{ request()->is('admin/ledger') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Ledger')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts.trialBalance') }}" class="nav-link  {{ request()->is('admin/trial-balance') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Trial Balance')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts.profitNLoss') }}" class="nav-link  {{ request()->is('admin/profit-n-loss') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Profit and Loss')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accounts.balanceSheet') }}" class="nav-link  {{ request()->is('admin/balance-sheet') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Balance Sheet')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
