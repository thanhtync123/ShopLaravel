@extends('layouts.app')

@section('title', 'Trang chủ')
@section('body_class', 'page-home')

@section('content')
    @php
        $featured = collect($products)->take(4);
        $deal = $products[0];
        $heroPrice = number_format($deal['price'], 0, ',', '.') . 'đ';
    @endphp

    <section class="home-hero">
        <div class="container hero-grid">
            <div class="hero-copy">
                <span class="eyebrow">New season 2026</span>
                <h1>Luma Shop</h1>
                <p>Template shop thời trang và lifestyle có sẵn trang chủ, cửa hàng, chi tiết sản phẩm, giỏ hàng, checkout và tài khoản.</p>
                <div class="hero-actions">
                    <a class="btn btn--primary btn--lg" href="{{ route('shop') }}">
                        <i data-lucide="shopping-bag"></i>
                        Mua ngay
                    </a>
                    <a class="btn btn--light btn--lg" href="{{ route('cart') }}">
                        <i data-lucide="receipt-text"></i>
                        Xem giỏ hàng
                    </a>
                </div>
                <dl class="hero-stats">
                    <div>
                        <dt>480+</dt>
                        <dd>Sản phẩm</dd>
                    </div>
                    <div>
                        <dt>24h</dt>
                        <dd>Giao nội thành</dd>
                    </div>
                    <div>
                        <dt>4.9</dt>
                        <dd>Điểm đánh giá</dd>
                    </div>
                </dl>
            </div>

            <div class="hero-visual">
                <img src="{{ $deal['image'] }}" alt="{{ $deal['name'] }}">
                <div class="hero-deal">
                    <span>Deal hôm nay</span>
                    <strong>{{ $deal['name'] }}</strong>
                    <small>{{ $heroPrice }}</small>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Danh mục</span>
                    <h2>Mua nhanh theo nhu cầu</h2>
                </div>
                <a class="text-link" href="{{ route('shop') }}">Xem tất cả <i data-lucide="arrow-right"></i></a>
            </div>

            <div class="category-grid">
                @foreach ($categories as $category)
                    <a class="category-card" href="{{ route('shop', ['category' => $category['slug']]) }}">
                        <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" loading="lazy">
                        <span>{{ $category['name'] }}</span>
                        <small>{{ $category['count'] }} sản phẩm</small>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Bán chạy</span>
                    <h2>Sản phẩm đang được chọn nhiều</h2>
                </div>
                <div class="segmented">
                    <button class="is-active" type="button">Tất cả</button>
                    <button type="button">Mới</button>
                    <button type="button">Sale</button>
                </div>
            </div>

            <div class="product-grid">
                @foreach ($featured as $product)
                    @include('partials.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>

    <section class="promo-band">
        <div class="container promo-grid">
            <div>
                <span class="eyebrow">Member sale</span>
                <h2>Giảm thêm 15% cho đơn hàng đầu tiên</h2>
                <p>Áp dụng cho bộ sưu tập sneakers, phụ kiện và lifestyle trong tuần này.</p>
            </div>
            <a class="btn btn--dark btn--lg" href="{{ route('checkout') }}">
                <i data-lucide="badge-percent"></i>
                Đặt hàng
            </a>
        </div>
    </section>

    <section class="section">
        <div class="container lookbook-grid">
            <a class="lookbook-item lookbook-item--wide" href="{{ route('shop') }}">
                <img src="https://images.unsplash.com/photo-1506629905607-d9f297d0f93b?auto=format&fit=crop&w=1200&q=80" alt="Bo suu tap streetwear" loading="lazy">
                <span>Streetwear edit</span>
            </a>
            <a class="lookbook-item" href="{{ route('shop') }}">
                <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=900&q=80" alt="Outfit hang ngay" loading="lazy">
                <span>Daily outfit</span>
            </a>
            <a class="lookbook-item" href="{{ route('shop') }}">
                <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=900&q=80" alt="Phu kien du lich" loading="lazy">
                <span>Travel kit</span>
            </a>
        </div>
    </section>
@endsection
