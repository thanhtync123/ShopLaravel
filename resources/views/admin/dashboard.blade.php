<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Luma Admin')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <a class="skip-link" href="#main">Bỏ qua menu</a>

    <div class="admin-shell">
        <aside class="admin-sidebar" data-admin-sidebar>
            <div class="admin-brand">
                <a class="admin-brand__logo" href="{{ route('admin.dashboard') }}" aria-label="Luma Admin">
                    <span>LA</span>
                </a>
                <div>
                    <strong>Luma Admin</strong>
                    <small>Shop manager</small>
                </div>
            </div>

            <nav class="admin-nav" aria-label="Menu quản trị">
                <a class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i data-lucide="layout-dashboard"></i>
                    <span>Tổng quan</span>
                </a>
            <a class="{{ request()->routeIs('admin.categories.index') ? 'is-active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i data-lucide="layout-dashboard"></i>
                    <span>Danh mục</span>
                </a>
                <a class="{{ request()->routeIs('admin.products.index') ? 'is-active' : '' }}" href="{{ route('admin.products.index') }}">
                    <i data-lucide="package"></i>
                    <span>Sản phẩm</span>
                </a>
            </nav>

            <div class="sidebar-summary">
                <span>@yield('sidebar_summary_label', 'Hệ thống')</span>
                <strong>@yield('sidebar_summary_value', 'Luma Shop')</strong>
                <div class="progress-bar" aria-label="Hoàn thành">
                    <span style="width: @yield('sidebar_summary_progress', '100%')"></span>
                </div>
            </div>

            <a class="store-link" href="{{ route('home') }}">
                <i data-lucide="store"></i>
                <span>Xem cửa hàng</span>
            </a>
        </aside>

        <button class="sidebar-scrim" type="button" data-admin-scrim aria-label="Đóng menu"></button>

        <div class="admin-main">
            <header class="admin-topbar">
                <button class="icon-action sidebar-toggle" type="button" data-admin-toggle aria-label="Mở menu" title="Menu">
                    <i data-lucide="menu"></i>
                </button>

                <form class="admin-search" action="#" method="get">
                    <i data-lucide="search"></i>
                    <input type="search" name="keyword" placeholder="@yield('admin_search_placeholder', 'Tìm kiếm...')">
                </form>

                <div class="topbar-actions">
                    <span class="date-pill">{{ now()->format('d/m/Y') }}</span>
                    <button class="icon-action" type="button" aria-label="Thông báo" title="Thông báo">
                        <i data-lucide="bell"></i>
                        <span class="notification-dot"></span>
                    </button>
                    <button class="admin-profile" type="button" aria-label="Tài khoản quản trị" title="Tài khoản">
                        <span>AD</span>
                    </button>
                </div>
            </header>

            <main id="main" class="admin-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script defer src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script defer src="{{ asset('js/admin-dashboard.js') }}"></script>
    @stack('scripts')
</body>

</html>