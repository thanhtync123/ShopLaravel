<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Luma Shop') | Template bán hàng</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shop-template.css') }}">
    @stack('styles')
</head>
<body class="@yield('body_class')">
    <a class="skip-link" href="#main">Bỏ qua menu</a>

    <div class="topbar">
        <div class="container topbar__inner">
            <span>Freeship đơn từ 499k</span>
            <span>Đổi trả 7 ngày</span>
            <span>Hotline: 1900 6868</span>
        </div>
    </div>

    <header class="site-header">
        <div class="container header-grid">
            <a class="brand" href="{{ route('home') }}" aria-label="Luma Shop">
                <span class="brand__mark">L</span>
                <span class="brand__text">Luma Shop</span>
            </a>

            <form class="header-search" action="{{ route('shop') }}" method="get">
                <i data-lucide="search"></i>
                <input type="search" name="q" placeholder="Tìm sneaker, balo, tai nghe..." value="{{ request('q') }}">
                <button type="submit">Tìm</button>
            </form>

            <nav class="primary-nav" aria-label="Menu chinh">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Trang chủ</a>
                <a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') || request()->routeIs('product.show') ? 'is-active' : '' }}">Cửa hàng</a>
                <a href="{{ route('cart') }}" class="{{ request()->routeIs('cart') ? 'is-active' : '' }}">Giỏ hàng</a>
                <a href="{{ route('checkout') }}" class="{{ request()->routeIs('checkout') ? 'is-active' : '' }}">Thanh toán</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">Liên hệ</a>
            </nav>

            <div class="header-actions">
                <a class="icon-btn" href="{{ route('account') }}" aria-label="Tài khoản" title="Tài khoản">
                    <i data-lucide="user-round"></i>
                </a>
                <a class="icon-btn icon-btn--cart" href="{{ route('cart') }}" aria-label="Giỏ hàng" title="Giỏ hàng">
                    <i data-lucide="shopping-bag"></i>
                    <span>3</span>
                </a>
                <button class="icon-btn mobile-toggle" type="button" data-menu-toggle aria-label="Mở menu" title="Menu">
                    <i data-lucide="menu"></i>
                </button>
            </div>
        </div>

        <div class="mobile-panel" data-mobile-menu>
            <form class="mobile-search" action="{{ route('shop') }}" method="get">
                <i data-lucide="search"></i>
                <input type="search" name="q" placeholder="Tìm sản phẩm...">
            </form>
            <a href="{{ route('home') }}">Trang chủ</a>
            <a href="{{ route('shop') }}">Cửa hàng</a>
            <a href="{{ route('cart') }}">Giỏ hàng</a>
            <a href="{{ route('checkout') }}">Thanh toán</a>
            <a href="{{ route('account') }}">Tài khoản</a>
            <a href="{{ route('contact') }}">Liên hệ</a>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <a class="brand brand--footer" href="{{ route('home') }}">
                    <span class="brand__mark">L</span>
                    <span class="brand__text">Luma Shop</span>
                </a>
                <p>Template shop hiện đại cho Laravel, gồm đầy đủ trang bán hàng, giỏ hàng, thanh toán và tài khoản.</p>
            </div>
            <div>
                <h3>Cửa hàng</h3>
                <a href="{{ route('shop') }}">Tất cả sản phẩm</a>
                <a href="{{ route('cart') }}">Giỏ hàng</a>
                <a href="{{ route('checkout') }}">Thanh toán</a>
            </div>
            <div>
                <h3>Hỗ trợ</h3>
                <a href="{{ route('contact') }}">Liên hệ</a>
                <a href="#">Chính sách đổi trả</a>
                <a href="#">Vận chuyển</a>
            </div>
            <form class="newsletter">
                <h3>Nhận ưu đãi mới</h3>
                <div>
                    <input type="email" placeholder="email@example.com">
                    <button type="submit" aria-label="Đăng ký nhận tin" title="Đăng ký">
                        <i data-lucide="send"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="container footer-bottom">
            <span>© {{ date('Y') }} Luma Shop.</span>
            <span>HTML CSS template bằng Laravel Blade.</span>
        </div>
    </footer>

    <div class="toast" data-toast>Đã thêm vào giỏ hàng</div>

    <script defer src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script defer src="{{ asset('js/shop-template.js') }}"></script>
    @stack('scripts')
</body>
</html>
