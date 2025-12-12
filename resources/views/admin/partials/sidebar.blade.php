<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Settings
    </div>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('qualifications.*')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="{{ request()->routeIs('qualifications.*')?'true':'false' }}" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-certificate"></i>
            <span>{{ trans('messages.qualifications') }}</span>
        </a>
        <div id="collapseTwo" class="collapse {{ request()->routeIs('qualifications.*')?'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('messages.pages') }}</h6>
                <a class="collapse-item {{ request()->routeIs('qualifications.index')?'active':'' }}" href="{{ route('qualifications.index') }}">{{ trans('messages.qualifications') }}</a>
                <a class="collapse-item {{ request()->routeIs('qualifications.create')?'active':'' }}" href="{{ route('qualifications.create') }}">{{ trans('messages.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('subjects.*')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseThree"
           aria-expanded="{{ request()->routeIs('subjects.*')?'true':'false' }}" aria-controls="collapseThree">
            <i class="fas fa-fw fa-book"></i>
            <span>{{ trans('messages.subjects') }}</span>
        </a>
        <div id="collapseThree" class="collapse {{ request()->routeIs('subjects.*')?'show':'' }}" aria-labelledby="headingTree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('messages.pages') }}</h6>
                <a class="collapse-item {{ request()->routeIs('subjects.index')?'active':'' }}" href="{{ route('subjects.index') }}">{{ trans('messages.subjects') }}</a>
                <a class="collapse-item {{ request()->routeIs('subjects.create')?'active':'' }}" href="{{ route('subjects.create') }}">{{ trans('messages.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('question-types.*')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseFour"
           aria-expanded="{{ request()->routeIs('question-types.*')?'true':'false' }}" aria-controls="collapseFour">
            <i class="fas fa-fw fa-list"></i>
            <span>{{ trans('messages.question_types') }}</span>
        </a>
        <div id="collapseFour" class="collapse {{ request()->routeIs('question-types.*')?'show':'' }}" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('messages.pages') }}</h6>
                <a class="collapse-item {{ request()->routeIs('question-types.index')?'active':'' }}" href="{{ route('question-types.index') }}">{{ trans('messages.question_types') }}</a>
                <a class="collapse-item {{ request()->routeIs('question-types.create')?'active':'' }}" href="{{ route('question-types.create') }}">{{ trans('messages.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('topics.*')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseFive"
           aria-expanded="{{ request()->routeIs('topics.*')?'true':'false' }}" aria-controls="collapseFive">
            <i class="fas fa-fw fa-tags"></i>
            <span>{{ trans('messages.topics') }}</span>
        </a>
        <div id="collapseFive" class="collapse {{ request()->routeIs('topics.*')?'show':'' }}" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('messages.pages') }}</h6>
                <a class="collapse-item {{ request()->routeIs('topics.index')?'active':'' }}" href="{{ route('topics.index') }}">{{ trans('messages.topics') }}</a>
                <a class="collapse-item {{ request()->routeIs('topics.create')?'active':'' }}" href="{{ route('topics.create') }}">{{ trans('messages.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('questions.*')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseSix"
           aria-expanded="{{ request()->routeIs('questions.*')?'true':'false' }}" aria-controls="collapseSix">
            <i class="fas fa-fw fa-lightbulb"></i>
            <span>{{ trans('messages.questions') }}</span>
        </a>
        <div id="collapseSix" class="collapse {{ request()->routeIs('questions.*')?'show':'' }}" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('messages.pages') }}</h6>
                <a class="collapse-item {{ request()->routeIs('questions.index')?'active':'' }}" href="{{ route('questions.index') }}">{{ trans('messages.questions') }}</a>
                <a class="collapse-item {{ request()->routeIs('questions.create')?'active':'' }}" href="{{ route('questions.create') }}">{{ trans('messages.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->routeIs('users.*')?'active':'' }}">
        <a class="nav-link {{ request()->routeIs('users.*')?'':'collapsed' }}" href="{{ route('users.index') }}" data-target="#collapseSeven"
           aria-expanded="{{ request()->routeIs('users.*')?'true':'false' }}" aria-controls="collapseSeven">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ trans('messages.users') }}</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('user-attempts.*')?'active':'' }}">
        <a class="nav-link {{ request()->routeIs('user-attempts.*')?'':'collapsed' }}" href="{{ route('user-attempts.index') }}" data-target="#collapseEight"
           aria-expanded="{{ request()->routeIs('user-attempts.*')?'true':'false' }}" aria-controls="collapseEight">
            <i class="fas fa-fw fa-user-clock"></i>
            <span>{{ trans('messages.user_attempts') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('announcements.*')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseNine"
           aria-expanded="{{ request()->routeIs('announcements.*')?'true':'false' }}" aria-controls="collapseNine">
            <i class="fas fa-fw fa-lightbulb"></i>
            <span>{{ trans('messages.announcements') }}</span>
        </a>
        <div id="collapseNine" class="collapse {{ request()->routeIs('announcements.*')?'show':'' }}" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('messages.pages') }}</h6>
                <a class="collapse-item {{ request()->routeIs('announcements.index')?'active':'' }}" href="{{ route('announcements.index') }}">{{ trans('messages.announcements') }}</a>
                <a class="collapse-item {{ request()->routeIs('announcements.create')?'active':'' }}" href="{{ route('announcements.create') }}">{{ trans('messages.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('textbooks.*')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTen"
           aria-expanded="{{ request()->routeIs('textbooks.*')?'true':'false' }}" aria-controls="collapseTen">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>{{ trans('messages.textbooks') }}</span>
        </a>
        <div id="collapseTen" class="collapse {{ request()->routeIs('textbooks.*')?'show':'' }}" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('messages.pages') }}</h6>
                <a class="collapse-item {{ request()->routeIs('textbooks.index')?'active':'' }}" href="{{ route('textbooks.index') }}">{{ trans('messages.textbooks') }}</a>
                <a class="collapse-item {{ request()->routeIs('textbooks.create')?'active':'' }}" href="{{ route('textbooks.create') }}">{{ trans('messages.create') }}</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
