<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ url('/admin') }}">
      <img alt="image" src="{{ asset('assets/admin/img/logo.png') }}" class="header-logo" />
      <span class="logo-name">Otika</span>
    </a>
  </div>

  {{-- Keeping everything for now; later we’ll replace links with route() and remove demo items one-by-one --}}
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>

    <li class="dropdown active">
      <a href="{{ url('/admin') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>

    <li class="dropdown">
  <a href="#" class="menu-toggle nav-link has-dropdown">
    <i data-feather="home"></i><span>Clinics</span>
  </a>
  <ul class="dropdown-menu">
    <li><a class="nav-link" href="{{ route('admin.clinics.pending') }}">Pending Clinics</a></li>
    <li><a class="nav-link" href="{{ route('admin.clinics.index') }}">All Clinics</a></li>
  </ul>
</li>

    

   

    
</aside>