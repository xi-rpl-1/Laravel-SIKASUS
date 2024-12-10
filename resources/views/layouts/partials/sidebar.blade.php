<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu Utama</div>
                @php
                    $role = session('role');
                @endphp
                {{-- Role Admin --}}
                @if (isset($role) && $role === 'admin')
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Manajemen</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseManagement" aria-expanded="false" aria-controls="collapseManagement">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data Master
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseManagement" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ url('/walikelas') }}">Wali Kelas</a>
                            <a class="nav-link" href="{{ url('/kelas') }}">Kelas</a>
                            <a class="nav-link" href="{{ url('/siswa') }}">Siswa</a>
                        </nav>
                    </div>

                    <a class="nav-link" href="{{ url('/kasus') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Kasus Siswa
                    </a>

                    {{-- Role Wali Kelas --}}
                @elseif (isset($role) && $role === 'walikelas')
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Menu Walikelas</div>
                    <a class="nav-link" href="{{ url('/siswa') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                        Siswa
                    </a>
                    <a class="nav-link" href="{{ url('/kasus') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Kasus Siswa
                    </a>
                @endif

                <div class="sb-sidenav-menu-heading">Akun</div>
                <a class="nav-link" href="{{ route('auth.logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ $role ?? 'Pengguna' }}
        </div>
    </nav>
</div>
