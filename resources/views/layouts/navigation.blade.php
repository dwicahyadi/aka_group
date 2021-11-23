<ul>
    <li class="nav-item @if(request()->routeIs('home')) active @endif">
        <a href="{{ route('home') }}">
              <span class="icon lni lni-dashboard"></span>
            <span class="text">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="divider"></li>

    @if(auth()->user()->role == 'admin')
        <li class="nav-item @if(request()->routeIs('user.*')) active @endif">
            <a href="{{ route('user.index') }}">
                <span class="icon lni lni-key"></span>
                <span class="text">Pengguna System</span>
            </a>
        </li>
    @endif

    <li class="nav-item @if(request()->routeIs('driver.*')) active @endif">
        <a href="{{ route('driver.index') }}">
            <span class="icon lni lni-users"></span>
            <span class="text">Pengemudi</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('tax_officer.*')) active @endif">
        <a href="{{ route('tax_officer.index') }}">
            <span class="icon lni lni-users"></span>
            <span class="text">Petugas Pajak</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('vehicle.*')) active @endif">
        <a href="{{ route('vehicle.index') }}">
            <span class="icon lni lni-car"></span>
            <span class="text">Kendaraan</span>
        </a>
    </li>

    <li class="divider"></li>


    <li class="nav-item @if(request()->routeIs('service.*')) active @endif">
        <a href="{{ route('service.index') }}">
            <span class="icon lni lni-cogs"></span>
            <span class="text">Servis Kendaraan</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('tax.*')) active @endif">
        <a href="{{ route('tax.index') }}">
            <span class="icon lni lni-certificate"></span>
            <span class="text">Pajak Kendaraan</span>
        </a>
    </li>

    <li class="divider"></li>

    <li class="nav-item nav-item-has-children @if(request()->routeIs('report.*')) active @endif">
        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
           aria-controls="ddmenu_1" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon lni lni-files">
            </span>
            <span class="text">Laporan</span>
        </a>
        <ul id="ddmenu_1" class="dropdown-nav expanded" style="">
            <li>
                <a class="@if(request()->routeIs('report.services')) active @endif" href="{{ route('report.services') }}">Servis Kendaraan</a>
            </li>
            <li>
                <a class="@if(request()->routeIs('report.upcoming-services')) active @endif" href="{{ route('report.upcoming-services') }}">Jadwal Servis</a>
            </li>
            <li>
                <a class="@if(request()->routeIs('report.taxes')) active @endif" href="{{ route('report.taxes') }}">Pajak Kendaraan</a>
            </li>
            <li>
                <a class="@if(request()->routeIs('report.upcoming-tax')) active @endif" href="{{ route('report.upcoming-taxes') }}">Jadwal Pajak</a>
            </li>
        </ul>
    </li>
</ul>
