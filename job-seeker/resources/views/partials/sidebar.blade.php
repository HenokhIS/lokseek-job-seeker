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
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admincategories.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Kategori</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('adminlocations.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Lokasi</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admintags.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tag</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('adminjobs.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Loker</span></a>
            </li>

        </ul>