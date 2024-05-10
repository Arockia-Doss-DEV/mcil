<div class="profile-overlay">
    <div class="profile-header">
        <div class="profile-head">
            <h4>Profile</h4>
            <i data-feather="log-out" class="profile-close"></i>
        </div>
        <div class="profile-info">
            <div class="profile-pic">
                <img src="{{ asset('assets/images/avatars/avatar.png') }}" alt="Profile Picture" />
            </div>
            <div class="profile-detail">
                <h4 class="name">{{ Auth::user()->first_name }}</h4>
                <div class="email mt-5"></div>
            </div>
        </div>
    </div>

    @php
        $notificationGlobal = getNotifications();
    @endphp

    <?php 
        $noti_count = 0;            
        if(!empty($notificationGlobal)){ 
            foreach ($notificationGlobal as $notification){
                $noti_count +=1; 
            }
        }
    ?>

    {{-- Mobile View --}}

    <div class="profile-body">
        <div class="body-wrapper">
            <ul class="nav navSideNewUl">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/notifications') }}">
                        <i data-feather="bell" class="menu-icon"></i>
                        <span class="menu-title">Notifications </span>
                        <span class="badge badge-sb-danger">{{ $noti_count }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i data-feather="message-square" class="menu-icon"></i>
                        <span class="menu-title">Messages </span>
                        <span class="badge badge-sb-danger">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/settings') }}">
                        <i data-feather="settings" class="menu-icon"></i>
                        <span class="menu-title">Settings </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('admin-logout-form').submit();">
                        <i data-feather="log-out" class="menu-icon"></i>
                        <span class="menu-title">Logout </span>
                    </a>

                    <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </div>
    </div>
</div>

<div class="settings-overlay">
    <div class="settings-header">
        <h4>Configurations</h4>
    </div>
    <i data-feather="arrow-left-circle" class="setting-close"></i>
    <div class="settings-body"> </div>
</div>
<div class="email-overlay">
    <div class="email">
        <div class="email-list-header">
            <h4>Email <small class="text-muted">12 New</small></h4>
            <a href="#" class="btn btn-soft-base overlay-close"><i data-feather="x"></i></a>
        </div>
        <div class="email-list-wrapper">
            <div class="email-list-scroll-container"> </div>
        </div>
    </div>
</div>

<div class="notification-overlay">
    <div class="notify-header">
        <h4>Notification</h4>
        <a href="#" class="btn btn-soft-base overlay-close"><i data-feather="x"></i></a>
    </div>
    <div class="notify-body"> </div>
</div>

<div class="sidebar-overlay"></div>

<nav class="navbar fixed-top">
    <div class="navbar-menu-container d-flex align-items-center justify-content-between">
        <div class="custom-new-nav-toggler">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="lgy-sb">
                <i class="fas fa-align-left"></i>
            </button>
        </div>
        <div class="custom-new-nav-mobile-toggler mobile-sidebar ">
            <button class="nav-link navbar-toggler navbar-toggler-right align-self-center" type="button"
                data-toggle="lgy-sidebar">
                <i class="fas fa-align-left"></i>
            </button>
        </div>
        <div class="text-center navbar-brand-container align-items-center justify-content-center">
            <a class="brand-logo" href="{{ url('/dashboard') }}">
                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="MCIL Logo" title="MCIL Logo" />
            </a>
        </div>

        @php
            $fundsGolbal = getFunds();
        @endphp

        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-block admin-dropdown">
                <select class="selectpicker" id="mcil_fund_gobal" onchange="mcilfundsetdefault();">
                    <option value="0"> All</option>
                    
                    <?php foreach($fundsGolbal as $key=>$fund){ ?>

                        <?php 
                            $sel = ''; 
                            if($fund['setdefault'] == 1){ 
                                $sel = 'selected'; 
                            }
                        ?>

                        <option <?= $sel; ?> value="<?= $fund->id ?>"><?= $fund->name ?></option>
                    <?php } ?>    

                </select>
            </li>

            <li class="nav-item custom-mobile-navView">
                <a class="nav-link count-highlighter" href="{{ url('/notifications') }}">
                    <i data-feather="bell" class="navfeathericon"></i>
                    <span class="badge badge-sb-danger new-bell-notification-count">{{ $noti_count }}</span>
                </a>
            </li>
            <li class="nav-item custom-mobile-navView mr-3">
                <a class="nav-link count-highlighter" href="{{ url('/chatify') }}">
                    <i data-feather="message-square" class="navfeathericon"></i>
                    <span class="notify-count"></span>
                </a>
            </li>
            
            <li class="nav-item d-none d-sm-block admin-dropdown admin-profile-dropdown">
                <select class="selectpicker" id="adminLogout">
                    <option value="0"> {{ Auth::user()->first_name }}</option>
                    <option value="1">Logout</option>
                </select>
            </li>
            <li class="nav-item  custom-mobile-navView">
                <a class="nav-link" href="{{ url('/settings') }}">
                    <i data-feather="settings" class="navfeathericon"></i>
                </a>
            </li>

            <li class="nav-item mobile-sidebar">
                <button class="nav-link navbar-toggler navbar-toggler-right align-self-center" type="button"
                    id="profileToolbar">
                    <i class="fas fa fa-ellipsis-v"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar-container flex-row" id="navbar">
    <div class="primary">
        <div class="sub-header">
            <a class="brand-logo" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="MCIL Logo" title="MCIL Logo"
                    class="mcil-full-logo" />
                <img src="{{ asset('assets/images/logo/side-nav-logo.png') }}" alt="MCIL Logo" title="MCIL Logo"
                    class="globe-logo" />
            </a>
        </div>
        <div class="nav-wrapper">
            <ul class="nav">
                <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i data-feather="home" class="menu-icon"></i>
                        <span class="menu-title">Dashboard </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#custom" aria-expanded="false"
                        aria-controls="ui-widget">
                        <i data-feather="file-text" class="menu-icon"></i>
                        <span class="menu-title">Contract Management</span>
                        <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse {{ Request::is('subscription*') ? 'show' : '' }}" id="custom">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item {{ (request()->is('subscription/pending')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/pending') }}"><span class="menu-title">Pending</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/funding')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/funding') }}"><span class="menu-title">Pending Funding</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/active')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/active') }}"><span class="menu-title">Active</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/deActive')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/deActive') }}"><span class="menu-title">De-Active</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/rejected')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/rejected') }}"><span class="menu-title">Rejected</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/matured')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/matured') }}"><span class="menu-title">Matured</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/draft')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/draft') }}"><span class="menu-title">Draft / Deleted</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/redemption')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/redemption') }}"><span class="menu-title">Redemption Requested</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/reInvestment')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/reInvestment') }}"><span class="menu-title">Re-Investment Requested</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('subscription/preMaturedRedemption')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/subscription/preMaturedRedemption') }}"><span class="menu-title">Pre-Mature Redemption</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#investor" aria-expanded="false"
                        aria-controls="ui-widget">
                        <i data-feather="user" class="menu-icon"></i>
                        <span class="menu-title">Investors</span>
                        <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse {{ Request::is('investor*') ? 'show' : '' }}" id="investor">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item {{ (request()->is('investor/active')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/investor/active') }}"><span class="menu-title">Investors Active</span>
                                </a>
                            </li>
                            <li class="nav-item {{ (request()->is('investor/inActive')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/investor/inActive') }}"><span class="menu-title">Investors In-active</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#agent" aria-expanded="false"
                        aria-controls="ui-widget">
                        <i data-feather="users" class="menu-icon"></i>
                        <span class="menu-title">Agents</span>
                        <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse {{ Request::is('agents*') ? 'show' : '' }}" id="agent">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item {{ (request()->is('agents/active')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/agents/active') }}"><span class="menu-title">Agents Active</span></a>
                            </li>
                            <li class="nav-item {{ (request()->is('agents/inActive')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/agents/inActive') }}"><span class="menu-title">Agents In-active</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false"
                        aria-controls="ui-widget">
                        <i data-feather="file" class="menu-icon"></i>
                        <span class="menu-title">Reports</span>
                        <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse {{ Request::is('reports*') ? 'show' : '' }}" id="report">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item {{ (request()->is('contract/reports')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/contract/reports') }}"><span class="menu-title">Contract Summary</span>
                                </a>
                            </li>

                            <li class="nav-item {{ (request()->is('reinvestment/reports')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/reinvestment/reports') }}"><span class="menu-title">Reinvestment Summary</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ (request()->is('newsletters')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/newsletters') }}">
                        <i data-feather="mail" class="menu-icon"></i>
                        <span class="menu-title">Newsletter</span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('divident/payouts')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/divident/payouts') }}">
                        <i data-feather="hash" class="menu-icon"></i>
                        <span class="menu-title">Dividend Payout</span>
                    </a>
                </li>
                
                <li class="nav-item {{ (request()->is('payouts')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/payouts') }}">
                        <i data-feather="dollar-sign" class="menu-icon"></i>
                        <span class="menu-title">Payouts</span>
                    </a>
                </li>
                
                <li class="nav-item {{ (request()->is('flash/messages')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/flash/messages') }}">
                        <i data-feather="grid" class="menu-icon"></i>
                        <span class="menu-title">Flash Messages</span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('audit/logs')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/audit/logs') }}">
                        <i data-feather="list" class="menu-icon"></i>
                        <span class="menu-title">Audit Logs</span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('mcilfunds')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/mcilfunds') }}">
                        <i data-feather="settings" class="menu-icon"></i>
                        <span class="menu-title">Fund Master</span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('roles')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/roles') }}">
                        <i data-feather="check-circle" class="menu-icon"></i>
                        <span class="menu-title">Roles & Permissions</span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('app/settings')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/app/settings') }}">
                        <i data-feather="toggle-left" class="menu-icon"></i>
                        <span class="menu-title">Master Settings</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>