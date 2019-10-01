<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIMKAR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}} ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Data Karyawan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/karyawan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Karyawan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Jabatan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/jabatan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Jabatan</span>
        </a>
    </li>

    <!-- Status -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/status')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Status</span>
        </a>
    </li>
    <!-- Pendidikan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/pendidikan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pendidikan</span>
        </a>
    </li>
    <!-- Riwayat Pendidikan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/riwayatPendidikan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Riwayat Pendidikan</span>
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->