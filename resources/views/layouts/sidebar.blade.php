<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('sneat/assets/img/favicon/logo.png') }}" width="50px" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Klinik </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Manajemen Klinik</span></li>

        <li class="menu-item  @yield('pesanan') ">
            <a href="{{ route('pesanan.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Pesanan </div>
                <?php
                $tmp = App\Models\Pesanan::join('users', 'pesanans.pelanggan_id', 'users.id')
                    ->distinct()
                    ->count();
                ?>

                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">
                    {{ $tmp }}</span>
                </span>
            </a>

        </li>

        <li class="menu-item @yield('layanan')">
            <a href="{{ route('layanan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Layanan</div>
            </a>
        </li>
        <li class="menu-item @yield('user')">
            <a href="{{ route('user') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">User</div>
            </a>
        </li>






    </ul>
</aside>
