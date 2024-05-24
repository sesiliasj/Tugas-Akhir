<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Zeroplag</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">Zp</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('teacher', 'student') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i>
                    Dashboard</a>
            </li>
            @if (Request::is('teacher*'))
                <li class="{{ Request::is('teacher/exam*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('teacher.exam.index') }}"><i class="fas fa-book"></i>
                        Exam</a>
                </li>
            @endif
            @if (Request::is('admin*'))
                <li class="{{ Request::is('admin/teacher*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.teacher.index') }}"><i class="fas fa-user"></i>
                        Teacher</a>
                </li>
                <li class="{{ Request::is('admin/course*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.course.index') }}"><i class="fas fa-boook"></i>
                        Course</a>
                </li>
            @endif
        </ul>
    </aside>
</div>
