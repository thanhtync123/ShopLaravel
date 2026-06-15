@extends('layouts.app')

@section('title', 'Giỏ hàng')
@section('body_class', 'page-cart')

@section('content')
    @php
        $cartItems = collect($products)->take(3);
        $subtotal = $cartItems->sum('price');
        $discount = 150000;
        $shipping = 30000;
        $total = $subtotal - $discount + $shipping;
    @endphp

    <section class="page-title">
        <div class="container page-title__inner">
            <div>
                <span class="eyebrow">Shopping bag</span>
                <h1>Giỏ hàng</h1>
            </div>
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Trang chủ</a>
                <i data-lucide="chevron-right"></i>
                <span>Giỏ hàng</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container cart-layout">
            <div class="cart-list">
                <div class="cart-list__head">
                    <h2>Sản phẩm đã chọn</h2>
                    <a href="{{ route('shop') }}">Tiếp tục mua sắm</a>
                </div>

                @foreach ($cartItems as $item)
                    <article class="cart-item">
                        <a class="cart-item__image" href="{{ route('product.show', $item['slug']) }}">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                        </a>
                        <div class="cart-item__info">
                            <span>{{ $item['category'] }}</span>
                            <h3><a href="{{ route('product.show', $item['slug']) }}">{{ $item['name'] }}</a></h3>
                            <small>Màu: {{ $item['color'] }} · Size M</small>
                            <button type="button"><i data-lucide="trash-2"></i> Xóa</button>
                        </div>
                        <div class="qty-control" data-qty>
                            <button type="button" data-qty-minus aria-label="Giảm số lượng"><i data-lucide="minus"></i></button>
                            <input type="number" value="{{ $loop->iteration }}" min="1" aria-label="Số lượng">
                            <button type="button" data-qty-plus aria-label="Tăng số lượng"><i data-lucide="plus"></i></button>
                        </div>
                        <strong>{{ number_format($item['price'], 0, ',', '.') }}đ</strong>
                    </article>
                @endforeach
            </div>

            <aside class="order-summary">
                <h2>Tổng đơn</h2>
                <form class="coupon-form">
                    <input type="text" value="LUMA15" aria-label="Mã giảm giá">
                    <button class="btn btn--ghost" type="submit">Áp dụng</button>
                </form>

                <div class="shipping-methods">
                    <label class="radio-row">
                        <input type="radio" name="shipping" checked>
                        <span>Giao tiêu chuẩn</span>
                        <strong>30.000đ</strong>
                    </label>
                    <label class="radio-row">
                        <input type="radio" name="shipping">
                        <span>Giao hỏa tốc</span>
                        <strong>60.000đ</strong>
                    </label>
                </div>

                <div class="summary-lines">
                    <div><span>Tạm tính</span><strong>{{ number_format($subtotal, 0, ',', '.') }}đ</strong></div>
                    <div><span>Giảm giá</span><strong>-{{ number_format($discount, 0, ',', '.') }}đ</strong></div>
                    <div><span>Vận chuyển</span><strong>{{ number_format($shipping, 0, ',', '.') }}đ</strong></div>
                    <div class="summary-total"><span>Thành tiền</span><strong>{{ number_format($total, 0, ',', '.') }}đ</strong></div>
                </div>

                <a class="btn btn--primary btn--block btn--lg" href="{{ route('checkout') }}">
                    <i data-lucide="credit-card"></i>
                    Thanh toán
                </a>
                <p class="secure-note"><i data-lucide="lock-keyhole"></i> Bảo mật thanh toán SSL</p>
            </aside>
        </div>
    </section>
@endsection
