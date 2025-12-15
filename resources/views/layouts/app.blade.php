<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangMu - @yield('title', 'Sistem Inventaris')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* CSS Kustom untuk Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding-top: 56px; /* Agar tidak tertutup Navbar */
            width: 220px; /* Lebar Sidebar */
            background-color: #4e73df; /* Warna Biru Primer */
            color: white;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.9);
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .main-content {
            /* Margin kiri menyesuaikan lebar sidebar */
            margin-left: 220px;
            padding: 20px;
            padding-top: 76px; /* Padding atas agar tidak tertutup Navbar */
        }
    </style>
</head>
<body>

    {{-- 1. NAVBAR (Header, Penyambutan Pengguna) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="{{ route('dashboard.index') }}">
                <i class="fas fa-warehouse me-2"></i> GudangMu
            </a>

            {{-- Selamat Datang Pengguna --}}
            <span class="navbar-text me-3 text-white">
                Selamat Datang, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>!
            </span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            {{-- 2. SIDEBAR (Navigasi Utama) --}}
            <nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block sidebar">
                <div class="position-sticky pt-3">

                    <h6 class="sidebar-heading px-3 mt-4 mb-1 text-white text-uppercase">
                        MENU UTAMA
                    </h6>
                    <ul class="nav flex-column mb-2">
                        {{-- Dashboard --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @if(request()->routeIs('dashboard.index')) active @endif"
                               href="{{ route('dashboard.index') }}">
                                <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading px-3 mt-4 mb-1 text-white text-uppercase">
                        MASTER DATA
                    </h6>
                    <ul class="nav flex-column mb-2">
                        {{-- Data Produk --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @if(request()->routeIs('products.*')) active @endif"
                               href="{{ route('products.index') }}">
                                <i class="fas fa-fw fa-boxes"></i> Data Produk
                            </a>
                        </li>
                        {{-- Data Kategori --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @if(request()->routeIs('categories.*')) active @endif"
                               href="{{ route('categories.index') }}">
                                <i class="fas fa-fw fa-tags"></i> Data Kategori
                            </a>
                        </li>
                        {{-- Data Supplier --}}
                        <li class="nav-item">
                            <a class="nav-link text-white @if(request()->routeIs('suppliers.*')) active @endif"
                               href="{{ route('suppliers.index') }}">
                                <i class="fas fa-fw fa-truck"></i> Data Supplier
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading px-3 mt-4 mb-1 text-white text-uppercase">
                        LAIN-LAIN
                    </h6>
                    <ul class="nav flex-column mb-2">
                        {{-- Logout --}}
                        <li class="nav-item">
                             <form action="{{ url('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link text-start w-100 text-white">
                                    <i class="fas fa-fw fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- 3. MAIN CONTENT AREA --}}
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
