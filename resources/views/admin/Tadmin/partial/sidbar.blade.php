<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-2 mb-3">
            <a href="index.html"><img style="max-width: 90px" src="{{ asset('Cprofile/img/logo5.png')}}" alt=""></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{ route('dashboard.index')}}"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{ route('user.index') }}"><i class="far fa-user"></i><span>Nasabah</span></a></li>
            <li><a class="nav-link" href="{{ route('trash.index') }}"><i class="fas fa-dumpster"></i><span>Sampah</span></a></li>
            <li><a class="nav-link" href="{{ route('collector.index')}}"><i class="fas fa-bicycle"></i> <span>Pengepul</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('transaction.index')}}">Beli Sampah</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('pull.index')}}">Tarik Saldo</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ Route('sell.index')}}">Jual Pengepul</a></li>
                </ul>
            </li>
            @if (auth()->user()->level=="admin")
            <li><a class="nav-link" href="{{ route('admin.index')}}"><i class="fas fa-pencil-ruler"></i> <span>Petugas</span></a></li>
            @endif
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Print Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('trash.pdfForm')}}">Data Sampah</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('collector.pdfForm')}}">Data Pengepul</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('transaction.pdfForm')}}">Data Beli Sampah</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('pull.pdfForm')}}">Data Tarik Saldo</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('sell.pdfForm')}}">Data Jual Pengepul</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>