<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('pengguna.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User </span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('buku.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Buku</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('genre.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Genre</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('gudang.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Rak</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('scan')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Scan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('buku.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Logout</span></a>
    </li>

</ul>