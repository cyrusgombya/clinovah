<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('clinic.dashboard') }}">
        <img alt="image" src="{{ asset('assets/admin/assets/img/logo.png') }}" class="header-logo" />
        <span class="logo-name">Clinic</span>
      </a>
    </div>

    <ul class="sidebar-menu">
      <li class="menu-header">Clinic Portal</li>

      <li class="dropdown {{ request()->routeIs('clinic.dashboard') ? 'active' : '' }}">
        <a href="{{ route('clinic.dashboard') }}" class="nav-link">
          <i data-feather="monitor"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="dropdown {{ request()->routeIs('clinic.documents*') ? 'active' : '' }}">
        <a href="{{ route('clinic.documents') }}" class="nav-link">
          <i data-feather="file-text"></i><span>Clinic Documents</span>
        </a>
      </li>

      <li class="dropdown {{ request()->routeIs('clinic.dentists*') ? 'active' : '' }}">
        <a href="{{ route('clinic.dentists') }}" class="nav-link">
          <i data-feather="users"></i><span>Dentists</span>
        </a>
      </li>

      <li class="dropdown {{ request()->routeIs('clinic.appointments*') ? 'active' : '' }}">
  <a href="{{ route('clinic.appointments.index') }}" class="nav-link">
    <i data-feather="calendar"></i><span>Appointments</span>
  </a>
  <li class="dropdown {{ request()->routeIs('clinic.profile*') ? 'active' : '' }}">
  <a href="{{ route('clinic.profile.edit') }}" class="nav-link">
    <i data-feather="settings"></i><span>Profile</span>
  </a>
</li>
      </li>
    </ul>
  </aside>
</div>