@extends('layouts.app')

@section('title', 'Thanh toán')
@section('body_class', 'page-checkout')

@section('content')
    @php
        $checkoutItems = collect($products)->take(3);
        $subtotal = $checkoutItems->sum('price');
        $discount = 150000;
        $shipping = 30000;
        $total = $subtotal - $discount + $shipping;
    @endphp

    <section class="page-title">
        <div class="container page-title__inner">
            <div>
                <span class="eyebrow">Checkout</span>
                <h1>Thanh toán</h1>
            </div>
            <div class="breadcrumbs">
                <a href="{{ route('cart') }}">Giỏ hàng</a>
                <i data-lucide="chevron-right"></i>
                <span>Thanh toán</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container checkout-layout">
            <form class="checkout-form">
                <div class="checkout-steps">
                    <span class="is-active">1</span>
                    <span>2</span>
                    <span>3</span>
                </div>

                <fieldset>
                    <legend>Thông tin liên hệ</legend>
                    <div class="form-grid">
                        <label>Họ và tên
                            <input type="text" value="Nguyen Van An">
                        </label>
                        <label>Số điện thoại
                            <input type="tel" value="0909 000 888">
                        </label>
                        <label class="form-wide">Email
                            <input type="email" value="an@example.com">
                        </label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Địa chỉ giao hàng</legend>
                    <div class="form-grid">
                        <label class="form-wide">Địa chỉ
                            <input type="text" value="123 Nguyen Hue">
                        </label>
                        <label>Tỉnh / Thành
                            <select>
                                <option>TP. Hồ Chí Minh</option>
                                <option>Hà Nội</option>
                                <option>Đà Nẵng</option>
                            </select>
                        </label>
                        <label>Quận / Huyện
                            <select>
                                <option>Quận 1</option>
                                <option>Quận 3</option>
                                <option>Thu Duc</option>
                            </select>
                        </label>
                        <label class="form-wide">Ghi chú
                            <textarea rows="4" placeholder="Thời gian giao, ghi chú cho shipper..."></textarea>
                        </label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Thanh toán</legend>
                    <div class="payment-grid">
                        <label class="payment-option">
                            <input type="radio" name="payment" checked>
                            <i data-lucide="banknote"></i>
                            <span>COD</span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment">
                            <i data-lucide="credit-card"></i>
                            <span>Thẻ ngân hàng</span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment">
                            <i data-lucide="qr-code"></i>
                            <span>QR Pay</span>
                        </label>
                    </div>
                </fieldset>
            </form>

            <aside class="order-summary order-summary--checkout">
                <h2>Đơn hàng</h2>
                <div class="checkout-items">
                    @foreach ($checkoutItems as $item)
                        <div class="checkout-item">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                            <div>
                                <strong>{{ $item['name'] }}</strong>
                                <span>Size M · x{{ $loop->iteration }}</span>
                            </div>
                            <small>{{ number_format($item['price'], 0, ',', '.') }}đ</small>
                        </div>
                    @endforeach
                </div>

                <div class="summary-lines">
                    <div><span>Tạm tính</span><strong>{{ number_format($subtotal, 0, ',', '.') }}đ</strong></div>
                    <div><span>Giảm giá</span><strong>-{{ number_format($discount, 0, ',', '.') }}đ</strong></div>
                    <div><span>Vận chuyển</span><strong>{{ number_format($shipping, 0, ',', '.') }}đ</strong></div>
                    <div class="summary-total"><span>Cần thanh toán</span><strong>{{ number_format($total, 0, ',', '.') }}đ</strong></div>
                </div>

                <button class="btn btn--primary btn--block btn--lg" type="button" data-add-cart>
                    <i data-lucide="check-circle-2"></i>
                    Hoàn tất đặt hàng
                </button>
            </aside>
        </div>
    </section>
@endsection
