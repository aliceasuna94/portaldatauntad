@role('prodi')

    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">PROGRAM STUDI</span></li>

    <!-- Cards -->
    <li class="menu-item {{ Request::is('prodi/profil') ? 'active' : '' }}">
        <a href="/prodi/profil" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>     
        <div data-i18n="Basic">Profil</div>
        </a>
    </li>

    <!-- Cards -->
    <li class="menu-item {{ Request::is('prodi/data') ? 'active' : '' }}">
        <a href="/prodi/data" class="menu-link">
        <i class="menu-icon tf-icons bx bx-buildings"></i>     
        <div data-i18n="Basic">Pangkalan Data</div>
        </a>
    </li>
@endrole

@role('prodi|universitas')
    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">SPMI</span></li>

    <!-- Cards -->
    <li class="menu-item {{ Request::is('spmi/penetapan') ? 'active' : '' }}">
        <a href="/spmi/penetapan" class="menu-link">
        <i class="menu-icon tf-icons bx bx-buildings"></i>     
        <div data-i18n="Basic">Penetapan</div>
        </a>
    </li>

    <li class="menu-item {{ Request::is('spmi/pelaksanaan') ? 'active' : '' }}">
        <a href="/spmi/pelaksanaan" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book"></i>
            <div data-i18n="Basic">Pelaksanaan</div>
        </a>
        </li>              

        <li class="menu-item {{ Request::is('spmi/pengendalian') ? 'active' : '' }}">
        <a href="/spmi/pengendalian" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">Pengendalian</div>
        </a>
        </li>

        <li class="menu-item {{ Request::is('spmi/peningkatan') ? 'active' : '' }}">
        <a href="/spmi/peningkatan" class="menu-link">
            <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
            <div data-i18n="Basic">Peningkatan</div>
        </a>
        </li>

        <li class="menu-item {{ Request::is('spmi/evaluasi') ? 'active' : '' }}">
        <a href="/spmi/evaluasi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
            <div data-i18n="Basic">Evaluasi</div>
        </a>
        </li>

@endrole