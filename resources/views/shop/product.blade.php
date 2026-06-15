@extends('layouts.app')

@section('title', $product['name'])
@section('body_class', 'page-product')

@section('content')
    @php
        $price = number_format($product['price'], 0, ',', '.') . 'đ';
        $oldPrice = $product['old_price'] ? number_format($product['old_price'], 0, ',', '.') . 'đ' : null;
        $related = collect($products)->where('slug', '!=', $product['slug'])->take(4);
    @endphp

    <section class="page-title page-title--compact">
        <div class="container page-title__inner">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Trang chủ</a>
                <i data-lucide="chevron-right"></i>
                <a href="{{ route('shop') }}">Cửa hàng</a>
                <i data-lucide="chevron-right"></i>
                <span>{{ $product['name'] }}</span>
            </div>
        </div>
    </section>

    <section class="section section--product">
        <div class="container product-detail">
            <div class="product-gallery">
                <div class="product-gallery__main">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                    <span class="product-badge">{{ $product['badge'] }}</span>
                </div>
                <div class="product-gallery__thumbs">
                    <button class="is-active" type="button"><img src="{{ $product['image'] }}" alt=""></button>
                    @foreach (collect($products)->take(3) as $thumb)
                        <button type="button"><img src="{{ $thumb['image'] }}" alt=""></button>
                    @endforeach
                </div>
            </div>

            <div class="product-info-panel">
                <span class="eyebrow">{{ $product['category'] }}</span>
                <h1>{{ $product['name'] }}</h1>
                <div class="rating-line">
                    <span><i data-lucide="star"></i>{{ $product['rating'] }}</span>
                    <span>{{ $product['reviews'] }} đánh giá</span>
                    <span>{{ $product['stock'] }}</span>
                </div>
                <p class="product-lead">{{ $product['description'] }}</p>

                <div class="price-row price-row--large">
                    <strong>{{ $price }}</strong>
                    @if ($oldPrice)
                        <del>{{ $oldPrice }}</del>
                    @endif
                </div>

                <div class="option-group">
                    <div class="option-label">
                        <span>Màu sắc</span>
                        <strong>{{ $product['color'] }}</strong>
                    </div>
                    <div class="swatches">
                        <button class="swatch swatch--black is-active" type="button" aria-label="Đen"></button>
                        <button class="swatch swatch--white" type="button" aria-label="Trắng"></button>
                        <button class="swatch swatch--green" type="button" aria-label="Xanh"></button>
                        <button class="swatch swatch--red" type="button" aria-label="Đỏ"></button>
                    </div>
                </div>

                <div class="option-group">
                    <div class="option-label">
                        <span>Kích cỡ</span>
                        <a href="#">Bảng size</a>
                    </div>
                    <div class="size-grid size-grid--inline">
                        <button type="button">S</button>
                        <button class="is-active" type="button">M</button>
                        <button type="button">L</button>
                        <button type="button">XL</button>
                    </div>
                </div>

                <div class="purchase-row">
                    <div class="qty-control" data-qty>
                        <button type="button" data-qty-minus aria-label="Giảm số lượng"><i data-lucide="minus"></i></button>
                        <input type="number" value="1" min="1" aria-label="Số lượng">
                        <button type="button" data-qty-plus aria-label="Tăng số lượng"><i data-lucide="plus"></i></button>
                    </div>
                    <button class="btn btn--primary btn--lg" type="button" data-add-cart>
                        <i data-lucide="shopping-cart"></i>
                        Thêm vào giỏ
                    </button>
                    <a class="btn btn--dark btn--lg" href="{{ route('checkout') }}">Mua ngay</a>
                </div>

                <div class="service-list">
                    <div><i data-lucide="truck"></i><span>Giao nhanh 24h nội thành</span></div>
                    <div><i data-lucide="refresh-cw"></i><span>Đổi trả trong 7 ngày</span></div>
                    <div><i data-lucide="shield-check"></i><span>Thanh toán bảo mật</span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="info-tabs">
                <details open>
                    <summary>Mô tả</summary>
                    <p>Form sản phẩm được thiết kế gọn, phù hợp đi làm, đi chơi và du lịch ngắn ngày. Chất liệu được chọn để dễ vệ sinh và bền trong quá trình sử dụng hằng ngày.</p>
                </details>
                <details>
                    <summary>Thông số</summary>
                    <p>Chất liệu cao cấp, đóng gói hộp giấy cứng, kèm hóa đơn và thẻ bảo hành tùy từng dòng sản phẩm.</p>
                </details>
                <details>
                    <summary>Vận chuyển</summary>
                    <p>Nội thành giao trong 24 giờ, tỉnh thành 2-4 ngày làm việc. Hỗ trợ kiểm tra hàng trước khi thanh toán.</p>
                </details>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Gợi ý</span>
                    <h2>Sản phẩm liên quan</h2>
                </div>
                <a class="text-link" href="{{ route('shop') }}">Xem thêm <i data-lucide="arrow-right"></i></a>
            </div>
            <div class="product-grid">
                @foreach ($related as $item)
                    @include('partials.product-card', ['product' => $item])
                @endforeach
            </div>
        </div>
    </section>
@endsection
