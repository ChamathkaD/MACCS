<nav id="sidebar" aria-label="Main Navigation">

    <div class="content-header bg-white-5">

        <a class="font-w600 text-dual" href="{{ url('/') }}">
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">{{ config('app.name') }}</span>
            </span>
        </a>

    </div>

    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link active" href="{{ url('/') }}">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>

            <li class="nav-main-heading">Main</li>

            @if(Auth::guard('admin')->check())

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-badge"></i>
                        <span class="nav-main-link-name">Midwives</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.midwives.index') }}">
                                <span class="nav-main-link-name">All Midwives</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.midwives.create') }}">
                                <span class="nav-main-link-name">Create Midwife</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-user-following"></i>
                        <span class="nav-main-link-name">Admins</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.admins.index') }}">
                                <span class="nav-main-link-name">All Admins</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('admin.admins.create') }}">
                                <span class="nav-main-link-name">Create Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('admin.moh.show') }}">
                        <i class="nav-main-link-icon si si-heart"></i>
                        <span class="nav-main-link-name">MOH</span>
                    </a>
                </li>

            @elseif(Auth::guard('midwife')->check())

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-users"></i>
                        <span class="nav-main-link-name">Parents</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('midwife.users.index') }}">
                                <span class="nav-main-link-name">All Parents</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('midwife.users.create') }}">
                                <span class="nav-main-link-name">Create Parent</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-envelope"></i>
                        <span class="nav-main-link-name">My Appointments</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('midwife.appointments.received') }}">
                                <span class="nav-main-link-name">Received</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('midwife.appointments.index') }}">
                                <span class="nav-main-link-name">Sent</span>
                            </a>
                        </li>
                    </ul>
                </li>

            @else

                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('children.create') }}">
                        <i class="nav-main-link-icon si si-user-follow"></i>
                        <span class="nav-main-link-name">Create Children</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-envelope"></i>
                        <span class="nav-main-link-name">My Appointments</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('appointments.create') }}">
                                <span class="nav-main-link-name">New</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('appointments.received') }}">
                                <span class="nav-main-link-name">Received</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('appointments.index') }}">
                                <span class="nav-main-link-name">Sent</span>
                            </a>
                        </li>
                    </ul>
                </li>

            @endisset

        </ul>
    </div>
</nav>
