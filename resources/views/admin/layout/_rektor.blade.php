@role('rektor')
    <!-- Components -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">SPMI</span>
    </li>
    <!-- Cards -->
    <li class="menu-item {{ Request::is('universitas/programstudi') ? 'active' : '' }}">
        <a href="/universitas/programstudi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-buildings"></i>
            <div data-i18n="Basic">Program Studi</div>
        </a>
    </li>
    <!-- Cards -->
    <li class="menu-item {{ Request::is('universitas/akreditasi') ? 'active' : '' }}">
        <a href="/universitas/akreditasi" class="menu-link">
            <i class="menu-icon tf-icons bx bx-award"></i>
            <div data-i18n="Basic">Akreditasi</div>
        </a>
    </li>
@endrole