<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo mt-3 ms-5">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo ms-4">
                <img src="/logo-transparan.png" alt="" width="67" height=67">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-semibold ms-2">HKBP</span> --}}
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @if (isset($menuData['menu']))
            @foreach ($menuData['menu'] as $menu)
                {{-- adding active and open class if child is active --}}

                {{-- menu headers --}}
                @if (isset($menu['menuHeader']))
                    <li class="menu-header fw-medium mt-3">
                        <span class="menu-header-text">{{ __($menu['menuHeader']) }}</span>
                    </li>
                @else
                    {{-- active menu method --}}
                    @php
                        $activeClass = null;
                        $currentRouteName = Route::currentRouteName();

                        if ($currentRouteName === $menu['slug']) {
                            $activeClass = 'active';
                        } elseif (isset($menu['submenu'])) {
                            if (is_array($menu['slug'])) {
                                foreach ($menu['slug'] as $slug) {
                                    if (
                                        str_contains($currentRouteName, $slug) &&
                                        strpos($currentRouteName, $slug) === 0
                                    ) {
                                        $activeClass = 'active open';
                                    }
                                }
                            } else {
                                if (
                                    str_contains($currentRouteName, $menu['slug']) &&
                                    strpos($currentRouteName, $menu['slug']) === 0
                                ) {
                                    $activeClass = 'active open';
                                }
                            }
                        }
                    @endphp

                    {{-- check if user is Jemaat and if data is incomplete --}}
                    @php
                        $jemaat = Auth::check() ? Auth::user()->jemaat : null;
                        $dataJemaatComplete =
                            $jemaat &&
                            $jemaat->nama_lengkap &&
                            $jemaat->jenis_kelamin &&
                            $jemaat->alamat &&
                            $jemaat->tanggal_lahir &&
                            $jemaat->umur &&
                            $jemaat->nama_ayah &&
                            $jemaat->nama_ibu &&
                            $jemaat->NIK;
                        $restrictedMenus = ['pendaftaran-menikah', 'pendaftaran-baptis', 'pendaftaran-sidi'];
                    @endphp

                    {{-- main menu --}}
                    <li class="menu-item {{ $activeClass }}">
                        @if (Auth::user()->role == 'Jemaat' && in_array($menu['slug'], $restrictedMenus) && !$dataJemaatComplete)
                            <a href="#" class="menu-link incomplete-data-link">
                            @else
                                <a href="{{ isset($menu['url']) ? url($menu['url']) : 'javascript:void(0);' }}"
                                    class="{{ isset($menu['submenu']) ? 'menu-link menu-toggle' : 'menu-link' }}"
                                    @if (isset($menu['target']) && !empty($menu['target'])) target="_blank" @endif>
                        @endif
                        @isset($menu['icon'])
                            <i class="{{ $menu['icon'] }}"></i>
                        @endisset
                        <div>{{ isset($menu['name']) ? __($menu['name']) : '' }}</div>
                        @isset($menu['badge'])
                            <div class="badge bg-{{ $menu['badge'][0] }} rounded-pill ms-auto">{{ $menu['badge'][1] }}
                            </div>
                        @endisset
                        </a>

                        {{-- submenu --}}
                        @isset($menu['submenu'])
                            @include('layouts.sections.menu.submenu', ['menu' => $menu['submenu']])
                        @endisset
                    </li>
                @endif
            @endforeach
        @endif
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.incomplete-data-link').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Identitas Belum Lengkap',
                        text: 'Silakan lengkapi identitas anda terlebih dahulu.',
                        footer: '<a href="{{ route('profile') }}">Klik untuk menuju halaman profile</a>'
                    });
                });
            });
        });
    </script>

</aside>
