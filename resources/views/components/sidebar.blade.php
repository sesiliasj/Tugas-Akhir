<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Zeroplag</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">Zp</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('teacher', 'student', 'admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i>
                    Dashboard</a>
            </li>
            @if (Request::is('teacher*'))
                <li class="nav-item dropdown {{ Request::is('teacher/exam*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Exam</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('teacher/exam') ? 'active' : '' }}'>
                            <a class="nav-link" href="{{ route('teacher.exam.index') }}">Index</a>
                        </li>
                        <li class="{{ Request::is('teacher/exam/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('teacher.exam.create') }}">Add Exam</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Request::is('admin*'))
                <li class="nav-item dropdown {{ Request::is('admin/course*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Course</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('admin/course') ? 'active' : '' }}'>
                            <a class="nav-link" href="{{ route('admin.course.index') }}">Index</a>
                        </li>
                        <li class="{{ Request::is('admin/course/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.course.create') }}">Add Course</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown {{ Request::is('admin/teacher*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Teacher</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('admin/teacher') ? 'active' : '' }}'>
                            <a class="nav-link" href="{{ route('admin.teacher.index') }}">Index</a>
                        </li>
                        <li class="{{ Request::is('admin/teacher/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.teacher.create') }}">Add Teacher</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown {{ Request::is('admin/student*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Student</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('admin/student') ? 'active' : '' }}'>
                            <a class="nav-link" href="{{ route('admin.student.index') }}">Index</a>
                        </li>
                        <li class="{{ Request::is('admin/teacher/create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.student.create') }}">Add Student</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Request::is('student*'))
                <li class="nav-item dropdown {{ Request::is('student/exam*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Exam</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('student/exam') ? 'active' : '' }}'>
                            <a class="nav-link" href="{{ route('student.exam.index') }}">Index</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
