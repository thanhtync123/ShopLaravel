@extends('layouts.app')

@section('title', 'Tài khoản')
@section('body_class', 'page-account')

@section('content')
    <section class="page-title">
        <div class="container page-title__inner">
            <div>
                <span class="eyebrow">Member</span>
                <h1>Tài khoản</h1>
            </div>
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Trang chủ</a>
                <i data-lucide="chevron-right"></i>
                <span>Tài khoản</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container account-layout">
            <aside class="account-sidebar">
                <div class="avatar-box">
                    <span>AN</span>
                    <div>
                        <strong>Nguyễn Văn An</strong>
                        <small>Silver member</small>
                    </div>
                </div>
                <nav>
                    <a class="is-active" href="#"><i data-lucide="layout-dashboard"></i> Tổng quan</a>
                    <a href="#"><i data-lucide="package"></i> Đơn hàng</a>
                    <a href="#"><i data-lucide="map-pin"></i> Địa chỉ</a>
                    <a href="#"><i data-lucide="heart"></i> Yêu thích</a>
                    <a href="#"><i data-lucide="log-out"></i> Đăng xuất</a>
                </nav>
            </aside>

            <div class="account-main">
                <div class="metric-grid">
                    <div class="metric-card">
                        <span>Đơn hàng</span>
                        <strong>12</strong>
                    </div>
                    <div class="metric-card">
                        <span>Điểm tích lũy</span>
                        <strong>1.240</strong>
                    </div>
                    <div class="metric-card">
                        <span>Voucher</span>
                        <strong>4</strong>
                    </div>
                </div>

                <section class="account-panel">
                    <div class="panel-head">
                        <h2>Đơn gần đây</h2>
                        <a href="#">Xem tất cả</a>
                    </div>
                    <div class="order-table">
                        <div class="order-row order-row--head">
                            <span>Mã đơn</span>
                            <span>Ngày</span>
                            <span>Trạng thái</span>
                            <span>Tổng</span>
                        </div>
                        <div class="order-row">
                            <span>#LM1024</span>
                            <span>15/06/2026</span>
                            <span class="status status--success">Đã giao</span>
                            <span>2.350.000đ</span>
                        </div>
                        <div class="order-row">
                            <span>#LM1025</span>
                            <span>12/06/2026</span>
                            <span class="status status--pending">Đang giao</span>
                            <span>890.000đ</span>
                        </div>
                        <div class="order-row">
                            <span>#LM1026</span>
                            <span>08/06/2026</span>
                            <span class="status status--muted">Đã hủy</span>
                            <span>590.000đ</span>
                        </div>
                    </div>
                </section>

                <section class="account-panel account-panel--split">
                    <form>
                        <h2>Cập nhật hồ sơ</h2>
                        <label>Họ tên<input type="text" value="Nguyễn Văn An"></label>
                        <label>Email<input type="email" value="an@example.com"></label>
                        <button class="btn btn--primary" type="submit">Lưu thay đổi</button>
                    </form>
                    <div class="address-box">
                        <h2>Địa chỉ mặc định</h2>
                        <p>123 Nguyễn Huệ, Quận 1, TP. Hồ Chí Minh</p>
                        <a class="btn btn--ghost" href="#">Chỉnh sửa</a>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
