<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->



        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Barang Masuk</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('barangmasuk.index') }}">
                        <i class="bi bi-circle"></i><span>Daftar Barang Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('barangmasuk.create') }}">
                        <i class="bi bi-circle"></i><span>Pencatatan Barang Masuk</span>
                    </a>
                </li>
            </ul>
        </li><!-- End barang masuk Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav-out" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Barang Keluar</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav-out" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('barangkeluar.index') }}">
                        <i class="bi bi-circle"></i><span>Daftar Barang Keluar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('barangkeluar.create') }}">
                        <i class="bi bi-circle"></i><span>Pencatatan Barang Keluar</span>
                    </a>
                </li>
            </ul>
        </li><!-- End barang masuk Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('stock.index') }}">
                <i class="bi bi-person"></i>
                <span>Stock Barang</span>
            </a>
        </li><!-- End stok barang Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
