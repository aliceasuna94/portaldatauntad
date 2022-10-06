@role('admin')
    <!-- Components -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Admin</span>
    </li>
    <!-- Cards -->
    <li class="menu-item {{ Request::is('admin/user') ? 'active' : '' }}">
        <a href="/admin/user" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Basic">Akun Pengguna</div>
        </a>
    </li>
    <!-- Cards -->
    <li class="menu-item {{ Request::is('admin/prodi') ? 'active' : '' }}">
        <a href="/admin/prodi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-layer"></i>
            <div data-i18n="Basic">Program Studi</div>
        </a>
    </li>
    <!-- Cards -->
    <li class="menu-item {{ Request::is('admin/spmi') ? 'active' : '' }}">
        <a href="/admin/spmi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
            <div data-i18n="Basic">Pengaturan SPMI</div>
        </a>
    </li>
    <!-- Cards -->
    <li class="menu-item {{ Request::is('admin/periode') ? 'active' : '' }}">
        <a href="/admin/periode" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar"></i>
            <div data-i18n="Basic">Periode</div>
        </a>
    </li>
    <!-- Cards -->
    <li class="menu-item {{ Request::is('admin/validasi*') ? 'active' : '' }}">
        <a href="/admin/validasi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
            <div data-i18n="Basic">Validasi</div>
        </a>
    </li>
@endrole