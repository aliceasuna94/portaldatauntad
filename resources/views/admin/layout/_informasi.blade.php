<!-- Misc -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Informasi</span></li>
<li class="menu-item {{ Request::is('home/hubungi') ? 'active' : '' }}">
    <a href="/home/hubungi" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">Contact Us</div>
    </a>
</li>
<li class="menu-item {{ Request::is('home/about') ? 'active' : '' }}">
    <a href="/home/about" class="menu-link">
    <i class="menu-icon tf-icons bx bx-file"></i>
    <div data-i18n="Documentation">About</div>
    </a>
</li>