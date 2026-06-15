@extends('layouts.app')

@section('title', 'Liên hệ')
@section('body_class', 'page-contact')

@section('content')
    <section class="page-title">
        <div class="container page-title__inner">
            <div>
                <span class="eyebrow">Support</span>
                <h1>Liên hệ</h1>
            </div>
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Trang chủ</a>
                <i data-lucide="chevron-right"></i>
                <span>Liên hệ</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container contact-layout">
            <div class="contact-info">
                <div class="contact-card">
                    <i data-lucide="phone"></i>
                    <h2>Hotline</h2>
                    <p>1900 6868</p>
                </div>
                <div class="contact-card">
                    <i data-lucide="mail"></i>
                    <h2>Email</h2>
                    <p>hello@lumashop.test</p>
                </div>
                <div class="contact-card">
                    <i data-lucide="map-pin"></i>
                    <h2>Showroom</h2>
                    <p>123 Nguyễn Huệ, Quận 1, TP. Hồ Chí Minh</p>
                </div>
            </div>

            <form class="contact-form">
                <h2>Gửi tin nhắn</h2>
                <div class="form-grid">
                    <label>Họ tên<input type="text" placeholder="Tên của bạn"></label>
                    <label>Email<input type="email" placeholder="email@example.com"></label>
                    <label class="form-wide">Chủ đề<input type="text" placeholder="Cần hỗ trợ về..."></label>
                    <label class="form-wide">Nội dung<textarea rows="6" placeholder="Nhập nội dung"></textarea></label>
                </div>
                <button class="btn btn--primary btn--lg" type="submit">
                    <i data-lucide="send"></i>
                    Gửi liên hệ
                </button>
            </form>

            <div class="map-panel">
                <img src="https://images.unsplash.com/photo-1518005020951-eccb494ad742?auto=format&fit=crop&w=1200&q=80" alt="Showroom Luma Shop" loading="lazy">
                <div>
                    <span>Open daily</span>
                    <strong>09:00 - 21:00</strong>
                </div>
            </div>
        </div>
    </section>
@endsection
