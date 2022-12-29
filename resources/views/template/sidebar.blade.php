<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (auth()->user()->role == 'driver')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.history') }}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengajuan.history_spj') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pengajuan SPJ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.timesheet_driver') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Timesheet</span>
            </a>
        </li>
        @elseif (auth()->user()->role == 'user')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Employee</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengajuan.spj') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pengajuan SPJ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.index') }}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.history_timesheet') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Timesheet</span>
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
            <a class="nav-link" href="{{ route('pengajuan.spj') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Pengajuan SPJ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.report_attendance') }}">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Report Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('spj.report_spj') }}">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Report SPJ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.history_timesheet') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Timesheet</span>
            </a>
        </li>
        @endif
    </ul>
</nav>