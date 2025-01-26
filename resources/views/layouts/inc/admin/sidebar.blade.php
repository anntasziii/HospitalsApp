<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{Request::is('admin/dashboard' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Hospitals</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/hospital/create') }}">Add Hospital</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/hospital')}}">View Hospital</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false">
          <i class="mdi mdi-circle-outline menu-icon"></i>
            <span class="menu-title">Doctors</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/doctors/create') }}">Add Doctors</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/doctors') }}">View Doctors</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false">
          <i class="mdi mdi-circle-outline menu-icon"></i>
            <span class="menu-title">Analysis</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/analysis/create') }}">Add Analysis</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/analysis') }}">View Analysis</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{Request::is('admin/types' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/types')}}">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Types</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/years' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/years')}}">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Years</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/sliders' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/sliders')}}">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Sliders</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/orders' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/orders')}}">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/settings' ? 'active':'')}}">
        <a class="nav-link" href="{{ url('admin/settings')}}">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Site Settings</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/users' ? 'active':'')}}">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/create') }}">Add User</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}">View Users</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
