<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Routine Management</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - User Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'users-add' || Route::currentRouteName() == 'users-view' || Route::currentRouteName() == 'users-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#userInfo" aria-expanded="true" aria-controls="userInfo">
          <i class="fas fa-user"></i>
          <span>User Controller</span>
        </a>
        <div id="userInfo" class="collapse {{(Route::currentRouteName() == 'users-add' || Route::currentRouteName() == 'users-view' || Route::currentRouteName() == 'users-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Information:</h6>

            <a class="{{Route::currentRouteName() == 'users-add' ? 'active' : '' }} collapse-item" href=" {{ route('users-add')}} ">Add User</a>

            <a class="{{(Route::currentRouteName() == 'users-view' || Route::currentRouteName() == 'users-edit' )? 'active' : '' }} collapse-item" href=" {{ route('users-view')}} ">Manage User</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Profile Collapse Menu -->
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'profiles-view' || Route::currentRouteName() == 'profiles-edit' || Route::currentRouteName() == 'profiles-password-view' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#profileInfo" aria-expanded="true" aria-controls="profileInfo">
          <i class="fas fa-user"></i>
          <span>Manage Profile</span>
        </a>
        <div id="profileInfo" class="collapse {{(Route::currentRouteName() == 'profiles-view' || Route::currentRouteName() == 'profiles-edit' || Route::currentRouteName() == 'profiles-password-view') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile Information:</h6>

            <a class="{{Route::currentRouteName() == 'profiles-view' || Route::currentRouteName() == 'profiles-edit' ? 'active' : '' }} collapse-item" href=" {{ route('profiles-view')}} ">Your Profile</a>

            <a class="{{(Route::currentRouteName() == 'profiles-password-view' || Route::currentRouteName() == 'users-edit' )? 'active' : '' }} collapse-item" href=" {{ route('profiles-password-view')}} ">Change Password</a>
          </div>
        </div>
      </li>

      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'admins-details' || Route::currentRouteName() == 'teachers-details' || Route::currentRouteName() == 'students-details' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#adminDetails" aria-expanded="true" aria-controls="adminDetails">
          <i class="fas fa-users"></i>
          <span>All User Details</span>
        </a>
        <div id="adminDetails" class="collapse {{(Route::currentRouteName() == 'admins-details' || Route::currentRouteName() == 'teachers-details' || Route::currentRouteName() == 'students-details') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">All User Details:</h6>

            <a class="{{(Route::currentRouteName() == 'admins-details' )? 'active' : '' }} collapse-item" href=" {{ route('admins-details')}} ">Admin Info</a>

            <a class="{{(Route::currentRouteName() == 'teachers-details' )? 'active' : '' }} collapse-item" href=" {{ route('teachers-details')}} ">Teachers Info</a>

            <a class="{{(Route::currentRouteName() == 'students-details' )? 'active' : '' }} collapse-item" href=" {{ route('students-details')}} ">Students Info</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Department Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'departments-add' || Route::currentRouteName() == 'departments-view' || Route::currentRouteName() == 'departments-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#departments" aria-expanded="true" aria-controls="departments">
          <i class="fa fa-diamond"></i>
          <span>Department Info</span>
        </a>
        <div id="departments" class="collapse {{(Route::currentRouteName() == 'departments-add' || Route::currentRouteName() == 'departments-view' || Route::currentRouteName() == 'departments-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Department Information:</h6>

            <a class="{{Route::currentRouteName() == 'departments-add' ? 'active' : '' }} collapse-item" href=" {{ route('departments-add')}} ">Add Department</a>

            <a class="{{(Route::currentRouteName() == 'departments-view' || Route::currentRouteName() == 'departments-edit' )? 'active' : '' }} collapse-item" href=" {{ route('departments-view')}} ">Manage Department</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Semester Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'semesters-add' || Route::currentRouteName() == 'semesters-view' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#semesters" aria-expanded="true" aria-controls="semesters">
          <i class="fa fa-diamond"></i>
          <span>Semester Info</span>
        </a>
        <div id="semesters" class="collapse {{(Route::currentRouteName() == 'semesters-add' || Route::currentRouteName() == 'semesters-view') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Semester Information:</h6>

            <a class="{{Route::currentRouteName() == 'semesters-add' ? 'active' : '' }} collapse-item" href=" {{ route('semesters-add')}} ">Add Semester</a>

            <a class="{{(Route::currentRouteName() == 'semesters-view')? 'active' : '' }} collapse-item" href=" {{ route('semesters-view')}} ">Manage Semester</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Section Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'sections-add' || Route::currentRouteName() == 'sections-view' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#sections" aria-expanded="true" aria-controls="sections">
          <i class="fa fa-diamond"></i>
          <span>Section Info</span>
        </a>
        <div id="sections" class="collapse {{(Route::currentRouteName() == 'sections-add' || Route::currentRouteName() == 'sections-view') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Section Information:</h6>

            <a class="{{Route::currentRouteName() == 'sections-add' ? 'active' : '' }} collapse-item" href=" {{ route('sections-add')}} ">Add Section</a>

            <a class="{{(Route::currentRouteName() == 'sections-view')? 'active' : '' }} collapse-item" href=" {{ route('sections-view')}} ">Manage Section</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Day Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'days-add' || Route::currentRouteName() == 'days-view' || Route::currentRouteName() == 'days-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#days" aria-expanded="true" aria-controls="days">
          <i class="fa fa-diamond"></i>
          <span>Day Info</span>
        </a>
        <div id="days" class="collapse {{(Route::currentRouteName() == 'days-add' || Route::currentRouteName() == 'days-view' || Route::currentRouteName() == 'days-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Day Information:</h6>

            <a class="{{Route::currentRouteName() == 'days-add' ? 'active' : '' }} collapse-item" href=" {{ route('days-add')}} ">Add Day</a>

            <a class="{{(Route::currentRouteName() == 'days-view' || Route::currentRouteName() == 'days-edit' )? 'active' : '' }} collapse-item" href=" {{ route('days-view')}} ">Manage Day</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Time Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'times-add' || Route::currentRouteName() == 'times-view' || Route::currentRouteName() == 'times-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#times" aria-expanded="true" aria-controls="times">
          <i class="fa fa-diamond"></i>
          <span>Time Info</span>
        </a>
        <div id="times" class="collapse {{(Route::currentRouteName() == 'times-add' || Route::currentRouteName() == 'times-view' || Route::currentRouteName() == 'times-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Time Information:</h6>

            <a class="{{Route::currentRouteName() == 'times-add' ? 'active' : '' }} collapse-item" href=" {{ route('times-add')}} ">Add Time</a>

            <a class="{{(Route::currentRouteName() == 'times-view' || Route::currentRouteName() == 'times-edit' )? 'active' : '' }} collapse-item" href=" {{ route('times-view')}} ">Manage Time</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Room Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'rooms-add' || Route::currentRouteName() == 'rooms-view' || Route::currentRouteName() == 'rooms-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#rooms" aria-expanded="true" aria-controls="rooms">
          <i class="fa fa-diamond"></i>
          <span>Room Info</span>
        </a>
        <div id="rooms" class="collapse {{(Route::currentRouteName() == 'rooms-add' || Route::currentRouteName() == 'rooms-view' || Route::currentRouteName() == 'rooms-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Room Information:</h6>

            <a class="{{Route::currentRouteName() == 'rooms-add' ? 'active' : '' }} collapse-item" href=" {{ route('rooms-add')}} ">Add Room</a>

            <a class="{{(Route::currentRouteName() == 'rooms-view' || Route::currentRouteName() == 'rooms-edit' )? 'active' : '' }} collapse-item" href=" {{ route('rooms-view')}} ">Manage Room</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Courses Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'courses-add' || Route::currentRouteName() == 'courses-view' || Route::currentRouteName() == 'courses-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#courses" aria-expanded="true" aria-controls="courses">
          <i class="fa fa-diamond"></i>
          <span>Courses Info</span>
        </a>
        <div id="courses" class="collapse {{(Route::currentRouteName() == 'courses-add' || Route::currentRouteName() == 'courses-view' || Route::currentRouteName() == 'courses-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Courses Information:</h6>

            <a class="{{Route::currentRouteName() == 'courses-add' ? 'active' : '' }} collapse-item" href=" {{ route('courses-add')}} ">Add Courses</a>

            <a class="{{(Route::currentRouteName() == 'courses-view' || Route::currentRouteName() == 'courses-edit' )? 'active' : '' }} collapse-item" href=" {{ route('courses-view')}} ">Manage Courses</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Batch Collapse Menu -->
      @if(Auth::user()->usertype == 'Admin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'batchs-add' || Route::currentRouteName() == 'batchs-view' || Route::currentRouteName() == 'batchs-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#batchs" aria-expanded="true" aria-controls="batchs">
          <i class="fa fa-diamond"></i>
          <span>Batch Info</span>
        </a>
        <div id="batchs" class="collapse {{(Route::currentRouteName() == 'batchs-add' || Route::currentRouteName() == 'batchs-view' || Route::currentRouteName() == 'batchs-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Batch Information:</h6>

            <a class="{{Route::currentRouteName() == 'batchs-add' ? 'active' : '' }} collapse-item" href=" {{ route('batchs-add')}} ">Add Batch</a>

            <a class="{{(Route::currentRouteName() == 'batchs-view' || Route::currentRouteName() == 'batchs-edit' )? 'active' : '' }} collapse-item" href=" {{ route('batchs-view')}} ">Manage Batch</a>
          </div>
        </div>
      </li>
      @endif



      <!-- Nav Item - Routine Collapse Menu -->
      @if(Auth::user()->usertype == 'Admin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'routines-add' || Route::currentRouteName() == 'routines-view' || Route::currentRouteName() == 'routines-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#routines" aria-expanded="true" aria-controls="routines">
          <i class="fa fa-diamond"></i>
          <span>Assign Teacher Info</span>
        </a>
        <div id="routines" class="collapse {{(Route::currentRouteName() == 'routines-add' || Route::currentRouteName() == 'routines-view' || Route::currentRouteName() == 'routines-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Routine Information:</h6>

            <a class="{{Route::currentRouteName() == 'routines-add' ? 'active' : '' }} collapse-item" href=" {{ route('routines-add')}} ">Assign Teacher</a>

            <a class="{{(Route::currentRouteName() == 'routines-view' || Route::currentRouteName() == 'routines-edit' )? 'active' : '' }} collapse-item" href=" {{ route('routines-view')}} ">Manage Assign Teacher</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Logo Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'logos-add' || Route::currentRouteName() == 'logos-view' || Route::currentRouteName() == 'logos-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#logoInfo" aria-expanded="true" aria-controls="logoInfo">
          <i class="fas fa-image"></i>
          <span>Logo Info</span>
        </a>
        <div id="logoInfo" class="collapse {{(Route::currentRouteName() == 'logos-add' || Route::currentRouteName() == 'logos-view' || Route::currentRouteName() == 'logos-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Logo Information:</h6>

            <a class="{{Route::currentRouteName() == 'logos-add' ? 'active' : '' }} collapse-item" href=" {{ route('logos-add')}} ">Add Logo</a>

            <a class="{{(Route::currentRouteName() == 'logos-view' || Route::currentRouteName() == 'logos-edit' )? 'active' : '' }} collapse-item" href=" {{ route('logos-view')}} ">Manage Logo</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Slider Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'sliders-add' || Route::currentRouteName() == 'sliders-view' || Route::currentRouteName() == 'sliders-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#sliders" aria-expanded="true" aria-controls="sliders">
          <i class="fas fa-image"></i>
          <span>Slider Info</span>
        </a>
        <div id="sliders" class="collapse {{(Route::currentRouteName() == 'sliders-add' || Route::currentRouteName() == 'sliders-view' || Route::currentRouteName() == 'sliders-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Slider Information:</h6>

            <a class="{{Route::currentRouteName() == 'sliders-add' ? 'active' : '' }} collapse-item" href=" {{ route('sliders-add')}} ">Add Slider</a>

            <a class="{{(Route::currentRouteName() == 'sliders-view' || Route::currentRouteName() == 'sliders-edit' )? 'active' : '' }} collapse-item" href=" {{ route('sliders-view')}} ">Manage Slider</a>
          </div>
        </div>
      </li>
      @endif


      <!-- Nav Item - Contact Collapse Menu -->
      @if(Auth::user()->usertype == 'SuperAdmin')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'contacts-communicate' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#contacts" aria-expanded="true" aria-controls="contacts">
          <i class="fas fa-link"></i>
          <span>Contact Info</span>
        </a>
        <div id="contacts" class="collapse {{(Route::currentRouteName() == 'contacts-communicate') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Contact Information:</h6>
            <a class="{{(Route::currentRouteName() == 'contacts-communicate')? 'active' : '' }} collapse-item" href=" {{ route('contacts-communicate')}} ">Manage Communicate</a>
          </div>
        </div>
      </li>
      @endif


      @if(Auth::user()->usertype == 'Teacher')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'teachers-makeRoutine' || Route::currentRouteName() == 'teachers-editRoutine' || Route::currentRouteName() == 'teachers-viewRoutine' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#teacherRoutine" aria-expanded="true" aria-controls="teacherRoutine">
          <i class="fa fa-diamond"></i>
          <span>Routine Schedule Info</span>
        </a>
        <div id="teacherRoutine" class="collapse {{(Route::currentRouteName() == 'teachers-makeRoutine' || Route::currentRouteName() == 'teachers-editRoutine' || Route::currentRouteName() == 'teachers-viewRoutine') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Teaacher Routine:</h6>

            <a class="{{Route::currentRouteName() == 'teachers-makeRoutine' || Route::currentRouteName() == 'teachers-editRoutine' ? 'active' : '' }} collapse-item" href=" {{ route('teachers-makeRoutine')}} ">Make Routine</a>

            <a class="{{(Route::currentRouteName() == 'teachers-viewRoutine' )? 'active' : '' }} collapse-item" href=" {{ route('teachers-viewRoutine')}} " target="_blank">View Routine</a>
          </div>
        </div>
      </li>
      @endif

      @if(Auth::user()->usertype == 'Student')
      <li class="nav-item">
        <a class="{{Route::currentRouteName() == 'students-viewRoutine' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#studentRoutine" aria-expanded="true" aria-controls="studentRoutine">
          <i class="fa fa-diamond"></i>
          <span>Student Routine Info</span>
        </a>
        <div id="studentRoutine" class="collapse {{(Route::currentRouteName() == 'students-viewRoutine') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Student Routine:</h6>

            <a class="{{(Route::currentRouteName() == 'students-viewRoutine' )? 'active' : '' }} collapse-item" href=" {{ route('students-viewRoutine')}} " target="_blank">View Routine</a>
          </div>
        </div>
      </li>
      @endif



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>