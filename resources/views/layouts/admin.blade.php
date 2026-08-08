<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Favicon -->
    @php
        $siteSettings = \App\Models\SiteSetting::first();
    @endphp
    @if($siteSettings && $siteSettings->favicon)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $siteSettings->favicon) }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $siteSettings->favicon) }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Dynamic Admin Theme CSS -->
    <style>
        {!! \App\Helpers\ThemeHelper::generateAdminCSS() !!}
    </style>
    
    <!-- Custom Admin CSS -->
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 0.5rem;
            margin: 0.2rem 0;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
            width: 20px;
        }
        /* Sidebar grup & submenu collapse */
        .sidebar .nav-group-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar .nav-group-toggle .bi-chevron-down {
            transition: transform 0.2s ease;
            font-size: 0.85rem;
        }
        .sidebar .nav-group-toggle[aria-expanded="true"] .bi-chevron-down {
            transform: rotate(180deg);
        }
        .sidebar .collapse .nav-link {
            padding-left: 2rem;
            font-size: 0.9rem;
        }
        .sidebar .nav-group-label {
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: rgba(255, 255, 255, 0.5);
            padding: 0.75rem 1rem 0.35rem;
            margin-top: 0.5rem;
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar-brand {
            font-weight: bold;
            color: #667eea !important;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-radius: 0.75rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        .table th {
            border-top: none;
            font-weight: 600;
            color: #495057;
        }
        .badge {
            font-size: 0.75em;
        }
        /* Mobile: sidebar sebagai overlay yang bisa dibuka */
        @media (max-width: 767.98px) {
            .admin-sidebar.collapse,
            .admin-sidebar {
                display: block !important;
                position: fixed;
                left: 0;
                top: 0;
                width: 280px;
                max-width: 85vw;
                height: 100vh;
                z-index: 1050;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
                box-shadow: 4px 0 15px rgba(0,0,0,0.15);
            }
            .admin-sidebar.sidebar-open {
                transform: translateX(0);
            }
            #admin-sidebar-backdrop {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1040;
                transition: opacity 0.3s ease;
            }
            #admin-sidebar-backdrop.show {
                display: block;
            }
            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Backdrop untuk menutup sidebar di mobile (hanya tampil saat sidebar terbuka) -->
    <div id="admin-sidebar-backdrop" class="d-md-none" aria-hidden="true"></div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="admin-sidebar" class="col-md-3 col-lg-2 d-md-block sidebar admin-sidebar collapse" aria-label="Menu navigasi">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        @php
                            $siteSettings = \App\Models\SiteSetting::first();
                        @endphp
                        @if($siteSettings && $siteSettings->logo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}" 
                                     class="img-fluid" style="max-height: 60px; max-width: 150px;">
                            </div>
                        @endif
                        <h4 class="text-white">
                            <i class="bi bi-shield-check"></i>
                            Admin Panel
                        </h4>
                        @if($siteSettings && $siteSettings->site_name)
                            <small class="text-white-50">{{ $siteSettings->site_name }}</small>
                        @endif
                    </div>
                    
                    <ul class="nav flex-column" id="sidebar-accordion">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.tutorial*') ? 'active' : '' }}" href="{{ route('admin.tutorial.index') }}">
                                <i class="bi bi-journal-text"></i>
                                Tutorial
                            </a>
                        </li>

                        {{-- Grup: Pengaturan --}}
                        @php $openPengaturan = request()->routeIs('admin.site-settings*', 'admin.sliders*', 'admin.running-texts*', 'admin.menus*', 'admin.quick-links*'); @endphp
                        <li class="nav-item">
                            <a class="nav-link nav-group-toggle {{ $openPengaturan ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-parent="#sidebar-accordion" href="#sidebar-pengaturan" role="button" aria-expanded="{{ $openPengaturan ? 'true' : 'false' }}" aria-controls="sidebar-pengaturan">
                                <span><i class="bi bi-gear"></i> Pengaturan</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse {{ $openPengaturan ? 'show' : '' }}" id="sidebar-pengaturan">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.site-settings*') ? 'active' : '' }}" href="{{ route('admin.site-settings.index') }}"><i class="bi bi-gear"></i> Pengaturan Website</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.sliders*') ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}"><i class="bi bi-images"></i> Slider</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.running-texts*') ? 'active' : '' }}" href="{{ route('admin.running-texts.index') }}"><i class="bi bi-text-paragraph"></i> Running Text</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.menus*') ? 'active' : '' }}" href="{{ route('admin.menus.index') }}"><i class="bi bi-list-ul"></i> Menu</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.quick-links*') ? 'active' : '' }}" href="{{ route('admin.quick-links.index') }}"><i class="bi bi-lightning-charge"></i> Akses Cepat</a></li>
                                </ul>
                            </div>
                        </li>

                        {{-- Grup: Konten --}}
                        @php $openKonten = request()->routeIs('admin.pages*', 'admin.categories*', 'admin.admin-posts*', 'admin.galleries*'); @endphp
                        <li class="nav-item">
                            <a class="nav-link nav-group-toggle {{ $openKonten ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-parent="#sidebar-accordion" href="#sidebar-konten" role="button" aria-expanded="{{ $openKonten ? 'true' : 'false' }}" aria-controls="sidebar-konten">
                                <span><i class="bi bi-file-earmark-text"></i> Konten</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse {{ $openKonten ? 'show' : '' }}" id="sidebar-konten">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}"><i class="bi bi-file-text"></i> Halaman</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"><i class="bi bi-tags"></i> Kategori</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.admin-posts*') ? 'active' : '' }}" href="{{ route('admin.admin-posts.index') }}"><i class="bi bi-newspaper"></i> Post/Artikel</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.galleries*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}"><i class="bi bi-collection"></i> Galeri</a></li>
                                </ul>
                            </div>
                        </li>

                        {{-- Grup: Program & SDM --}}
                        @php $openProgram = request()->routeIs('admin.admin-programs*', 'admin.teachers*'); @endphp
                        <li class="nav-item">
                            <a class="nav-link nav-group-toggle {{ $openProgram ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-parent="#sidebar-accordion" href="#sidebar-program" role="button" aria-expanded="{{ $openProgram ? 'true' : 'false' }}" aria-controls="sidebar-program">
                                <span><i class="bi bi-book"></i> Program & SDM</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse {{ $openProgram ? 'show' : '' }}" id="sidebar-program">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.admin-programs*') ? 'active' : '' }}" href="{{ route('admin.admin-programs.index') }}"><i class="bi bi-book"></i> Program</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.teachers*') ? 'active' : '' }}" href="{{ route('admin.teachers.index') }}"><i class="bi bi-person-badge"></i> Guru</a></li>
                                </ul>
                            </div>
                        </li>

                        {{-- Grup: Informasi --}}
                        @php $openInfo = request()->routeIs('admin.announcements*', 'admin.downloads*', 'admin.faqs*'); @endphp
                        <li class="nav-item">
                            <a class="nav-link nav-group-toggle {{ $openInfo ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-parent="#sidebar-accordion" href="#sidebar-informasi" role="button" aria-expanded="{{ $openInfo ? 'true' : 'false' }}" aria-controls="sidebar-informasi">
                                <span><i class="bi bi-info-circle"></i> Informasi</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse {{ $openInfo ? 'show' : '' }}" id="sidebar-informasi">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.announcements*') ? 'active' : '' }}" href="{{ route('admin.announcements.index') }}"><i class="bi bi-megaphone"></i> Pengumuman</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.downloads*') ? 'active' : '' }}" href="{{ route('admin.downloads.index') }}"><i class="bi bi-download"></i> Download</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}"><i class="bi bi-question-circle"></i> FAQ</a></li>
                                </ul>
                            </div>
                        </li>

                        {{-- Grup: Tampilan --}}
                        @php $openTampilan = request()->routeIs('admin.testimonials*', 'admin.statistics*', 'admin.features*'); @endphp
                        <li class="nav-item">
                            <a class="nav-link nav-group-toggle {{ $openTampilan ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-parent="#sidebar-accordion" href="#sidebar-tampilan" role="button" aria-expanded="{{ $openTampilan ? 'true' : 'false' }}" aria-controls="sidebar-tampilan">
                                <span><i class="bi bi-display"></i> Tampilan</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse {{ $openTampilan ? 'show' : '' }}" id="sidebar-tampilan">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}"><i class="bi bi-chat-quote"></i> Testimoni</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.statistics*') ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}"><i class="bi bi-graph-up"></i> Statistik</a></li>
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.features*') ? 'active' : '' }}" href="{{ route('admin.features.index') }}"><i class="bi bi-star"></i> Fitur</a></li>
                                </ul>
                            </div>
                        </li>

                        {{-- Grup: Layanan --}}
                        @php $openLayanan = request()->routeIs('admin.contacts*', 'admin.comments*'); @endphp
                        <li class="nav-item">
                            <a class="nav-link nav-group-toggle {{ $openLayanan ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-parent="#sidebar-accordion" href="#sidebar-layanan" role="button" aria-expanded="{{ $openLayanan ? 'true' : 'false' }}" aria-controls="sidebar-layanan">
                                <span><i class="bi bi-headset"></i> Layanan</span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse {{ $openLayanan ? 'show' : '' }}" id="sidebar-layanan">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}"><i class="bi bi-envelope"></i> Kontak</a></li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('admin.comments*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
                                            <i class="bi bi-chat-dots"></i> Komentar
                                            @php $pendingComments = \App\Models\Comment::where('is_approved', false)->count(); @endphp
                                            @if($pendingComments > 0)<span class="badge bg-warning ms-1">{{ $pendingComments }}</span>@endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item mt-3 pt-2 border-top border-secondary">
                            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                                <i class="bi bi-eye"></i>
                                Lihat Website
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <!-- Top navbar -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom admin-header">
                    <div class="d-flex align-items-center flex-grow-1">
                        <!-- Tombol menu (hanya tampil di mobile) -->
                        <button type="button" class="btn btn-link text-dark p-2 me-2 d-md-none" id="admin-sidebar-toggle" aria-label="Buka menu navigasi" title="Buka menu">
                            <i class="bi bi-list" style="font-size: 1.5rem;"></i>
                        </button>
                        @php
                            $siteSettings = \App\Models\SiteSetting::first();
                        @endphp
                        @if($siteSettings && $siteSettings->logo)
                            <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}" 
                                 class="me-3 d-none d-sm-inline" style="max-height: 40px; max-width: 120px;">
                        @endif
                        <h1 class="h2 mb-0 text-truncate">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <span class="text-muted small">
                                <i class="bi bi-person-circle"></i>
                                {{ Auth::user()->name }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- Mobile sidebar: buka/tutup dengan tombol dan backdrop -->
    <script>
    (function() {
        function initMobileSidebar() {
            var sidebar = document.getElementById('admin-sidebar');
            var toggle = document.getElementById('admin-sidebar-toggle');
            var backdrop = document.getElementById('admin-sidebar-backdrop');
            if (!sidebar || !toggle || !backdrop) return;

            function openSidebar() {
                sidebar.classList.add('sidebar-open');
                backdrop.classList.add('show');
                document.body.style.overflow = 'hidden';
                toggle.setAttribute('aria-label', 'Tutup menu navigasi');
                toggle.querySelector('i').className = 'bi bi-x-lg';
            }
            function closeSidebar() {
                sidebar.classList.remove('sidebar-open');
                backdrop.classList.remove('show');
                document.body.style.overflow = '';
                toggle.setAttribute('aria-label', 'Buka menu navigasi');
                toggle.querySelector('i').className = 'bi bi-list';
            }
            function toggleSidebar() {
                if (sidebar.classList.contains('sidebar-open')) closeSidebar();
                else openSidebar();
            }

            toggle.addEventListener('click', toggleSidebar);
            backdrop.addEventListener('click', closeSidebar);
            // Tutup sidebar hanya saat link navigasi (ke halaman) diklik, BUKAN saat klik grup collapse (Pengaturan, Konten, dll)
            sidebar.querySelectorAll('.nav-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth >= 768) return;
                    var href = (link.getAttribute('href') || '').trim();
                    // Jika href diawali # berarti ini tombol collapse (buka/tutup submenu), jangan tutup sidebar
                    if (href.indexOf('#') === 0) return;
                    // Link ke halaman (mis. /admin/dashboard) → tutup sidebar setelah navigasi
                    closeSidebar();
                });
            });
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initMobileSidebar);
        } else {
            initMobileSidebar();
        }
    })();
    </script>

    <!-- Sidebar accordion: hanya satu grup terbuka -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var accordion = document.getElementById('sidebar-accordion');
        if (!accordion) return;
        var collapseTargets = ['sidebar-pengaturan', 'sidebar-konten', 'sidebar-program', 'sidebar-informasi', 'sidebar-tampilan', 'sidebar-layanan'];
        collapseTargets.forEach(function(id) {
            var el = document.getElementById(id);
            if (el) {
                el.addEventListener('show.bs.collapse', function() {
                    collapseTargets.forEach(function(otherId) {
                        if (otherId !== id) {
                            var other = document.getElementById(otherId);
                            if (other) {
                                var bsCollapse = bootstrap.Collapse.getInstance(other);
                                if (bsCollapse) bsCollapse.hide();
                                else {
                                    var c = new bootstrap.Collapse(other, { toggle: false });
                                    c.hide();
                                }
                            }
                        }
                    });
                });
            }
        });
    });
    </script>
    
    @stack('scripts')
</body>
</html>
