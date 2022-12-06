<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if (auth()->user()->role == 'user')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.history') }}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengajuan_spj.create') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pengajuan SPJ</span>
            </a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Employee</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.index') }}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengajuan_spj.index') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pengajuan SPJ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Invoice</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ url('assets/') }}/pages/charts/chartjs.html">Payroll</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('assets/') }}/pages/samples/login.html">
                            Login
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('assets/') }}/pages/samples/register.html">
                            Register
                        </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('assets/') }}/pages/samples/error-404.html">
                            404 </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('assets/') }}/pages/samples/error-500.html">
                            500 </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('assets/') }}/pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
        @endif
    </ul>
</nav>