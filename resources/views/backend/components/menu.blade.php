            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline @if(\Lang::getLocale() == 'ar') ml-auto @else mr-auto @endif">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i style="color: white;" class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>

                </form>

                <ul class="navbar-nav navbar-right">


                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Hi,{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">{{ Auth::user()->email }}</div>
                            <a href="{{ route('edit_users',auth()->user()->id) }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout_users') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="{{ asset('dashboard/assets/img/stisla-fill.svg') }}" style="width: 45px;" alt="" srcset="">
                        <a href="{{ route('home') }}">Dashboard</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('home') }}">DB</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class=""><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Home</span></a></li>

                        <li class="menu-header">Authentication</li>

                        @can('show_roles')
                        <li class="{{ menuActive('roles',3) }}"><a class="nav-link" href="{{ route('roles') }}"><i class="fas fa-lock"></i> <span>Roles</span></a></li>
                        @endcan

                        @can('show_users')
                        <li class="nav-item dropdown {{ menuActive('all-users',3) }} {{ menuActive('users',3) }} {{ menuActive('user-follows',3) }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('create_users') }}">New User</a></li>
                                <li><a class="nav-link" href="{{ route('users') }}">All Users</a></li>
                            </ul>
                        </li>
                        @endcan

                        <li class="menu-header">Website</li>
                        @can('show_categories')
                        <li class="nav-item dropdown {{ menuActive('all-categories',3) }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Categories</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('create_categories') }}">New Category</a></li>
                                <li><a class="nav-link" href="{{ route('categories') }}">All Categories</a></li>
                            </ul>
                        </li>
                        @endcan

                        @can('show_tags')
                        <li class="nav-item dropdown {{ menuActive('all-tags',3) }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Tags</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('create_tags') }}">New Tag</a></li>
                                <li><a class="nav-link" href="{{ route('tags') }}">All Tags</a></li>
                            </ul>
                        </li>
                        @endcan

                        @can('show_ads')
                        <li class="nav-item dropdown {{ menuActive('all-ads',3) }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Ads</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('create_ads') }}">New Ads</a></li>
                                <li><a class="nav-link" href="{{ route('ads') }}">All Ads</a></li>
                            </ul>
                        </li>
                        @endcan

                        <li class=""><a class="nav-link" href="{{ route('clear_cache') }}"><i class="fas fa-trash"></i> <span>Clear Cache</span></a></li>
                    </ul>

                </aside>
            </div>
