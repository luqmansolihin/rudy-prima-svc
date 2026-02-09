<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <img class="sidebar-brand-full" width="150" height="32" src="{{ asset('assets/img/RPS FULL.png') }}"
                alt="{{ config('app.name') }}">
            <img class="sidebar-brand-narrow" width="32" height="32"
                src="{{ asset('assets/img/RPS NARROW.png') }}" alt="{{ config('app.name') }}">
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li
            class="nav-group {{ Route::is('customers.*', 'mechanics.*', 'suppliers.*', 'spareparts.*') ? 'show' : '' }}">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-storage') }}"></use>
                </svg>
                Master
            </a>
            <ul class="nav-group-items compact">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('customers.*') ? 'active' : '' }}"
                        href="{{ route('customers.index') }}">
                        <span class="nav-icon">
                            <span class="nav-icon-bullet"></span>
                        </span>
                        Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('mechanics.*') ? 'active' : '' }}"
                        href="{{ route('mechanics.index') }}">
                        <span class="nav-icon">
                            <span class="nav-icon-bullet"></span>
                        </span>
                        Mekanik
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('suppliers.*') ? 'active' : '' }}"
                        href="{{ route('suppliers.index') }}">
                        <span class="nav-icon">
                            <span class="nav-icon-bullet"></span>
                        </span>
                        Supplier
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('spareparts.*') ? 'active' : '' }}"
                        href="{{ route('spareparts.index') }}">
                        <span class="nav-icon">
                            <span class="nav-icon-bullet"></span>
                        </span>
                        Spareparts
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
