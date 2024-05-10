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
                <h4 class="name">{{ auth()->user()->first_name . auth()->user()->last_name }}</h4>
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

    <div class="profile-body">
        <div class="body-wrapper">
            <ul class="nav navSideNewUl">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/company/notifications') }}">
                        <i data-feather="bell" class="menu-icon"></i>
                        <span class="menu-title">Notifications </span>
                        <span class="badge badge-sb-danger">{{ $noti_count }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/chatify/investor') }}">
                        <i data-feather="message-square" class="menu-icon"></i>
                        <span class="menu-title">Messages </span>
                        <span class="badge badge-sb-danger">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/company/settings') }}">
                        <i data-feather="settings" class="menu-icon"></i>
                        <span class="menu-title">Settings </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('company-form').submit();">
                        <i data-feather="log-out" class="menu-icon"></i>
                        <span class="menu-title">Logout </span>
                    </a>
                    <form id="company-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <a class="brand-logo" href="{{ url('/company/dashboard') }}">
                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="MCIL Logo" title="MCIL Logo" />
            </a>
        </div>
        
        <ul class="navbar-nav">
            <li class="nav-item custom-mobile-navView">
                <a class="nav-link {{ $noti_count != 0 ? 'count-highlighter' : '' }}" href="{{ url('/company/notifications') }}">
                    <i data-feather="bell" class="navfeathericon"></i>
                    <span class="badge badge-sb-danger new-bell-notification-count">{{ $noti_count }}</span>
                </a>
            </li>
            <li class="nav-item  custom-mobile-navView">
                <a class="nav-link count-highlighter" href="{{ url('/chatify/investor') }}">
                    <i data-feather="message-square" class="navfeathericon"></i>
                    <span class="notify-count"></span>
                    {{-- <span class="badge badge-sb-danger new-msg-notification-count">0</span> --}}
                </a>
            </li>

            <li class="nav-item d-none d-sm-block admin-dropdown admin-profile-dropdown">
                <select class="selectpicker" id="companyLogout">
                    <option value="0"> {{ auth()->user()->last_name }}</option>
                    <option value="1">Logout</option>
                </select>
            </li>

            <li class="nav-item  custom-mobile-navView">
                <a class="nav-link" href="{{ url('/company/settings') }}">
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
            <a class="brand-logo" href="{{ url('/company/dashboard') }}">
                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="MCIL Logo" title="MCIL Logo"
                class="mcil-full-logo" />
                <img src="{{ asset('assets/images/logo/side-nav-logo.png') }}" alt="MCIL Logo" title="MCIL Logo"
                class="globe-logo" />
            </a>
        </div>
        <div class="nav-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/company/dashboard') }}">
                        <i data-feather="home" class="menu-icon"></i>
                        <span class="menu-title">Dashboard </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/company/myprofile') }}">
                        <i data-feather="user" class="menu-icon"></i>
                        <span class="menu-title">Profile </span>
                    </a>
                </li>

                @php
                    $globalSubscription = subscriptionGlobal();
                @endphp

               <?php if(!empty($globalSubscription)): ?>
                    <?php if($globalSubscription->notification_doc == 1): ?>
                
                        <li class="nav-item {{ (request()->is('company/documentBankIndex')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/company/documentBankIndex') }}">
                                <i data-feather="book" class="menu-icon"></i>
                                <span class="menu-title">Upload Documents </span>
                                <span class="badge badge-sb-danger">1</span>
                            </a>
                        </li>

                    <?php endif; ?>
                <?php endif; ?>

                <li class="nav-item {{ (request()->is('company/subscriptions')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/company/subscriptions') }}">
                        <i data-feather="dollar-sign" class="menu-icon"></i>
                        <span class="menu-title">My Investment </span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('company/newsletters')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/company/newsletters') }}">
                        <i data-feather="mail" class="menu-icon"></i>
                        <span class="menu-title">Newsletter </span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('company/fmsgIndex')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/company/fmsgIndex') }}">
                        <i data-feather="volume-2" class="menu-icon"></i>
                        <span class="menu-title">Flash Messages</span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('user/audit/logs')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/user/audit/logs') }}">
                        <i data-feather="grid" class="menu-icon"></i>
                        <span class="menu-title">Audit Logs</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>