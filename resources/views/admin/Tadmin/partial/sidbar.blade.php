<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">TrashId</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="#"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Nasabah</span></a></li>
            <li><a class="nav-link" href="{{ route('trash.index') }}"><i class="far fa-file-alt"></i> <span>Sampah</span></a></li>
            <li><a class="nav-link" href="{{ route('collector.index')}}"><i class="fas fa-bicycle"></i> <span>Pengepul</span></a></li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link beep beep-sidebar" href="#">Beli Sampah</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="#">Tarik Saldo</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ Route('sell.index')}}">Jual Pengepul</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>