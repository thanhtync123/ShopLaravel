@extends('layouts.app')

@section('title', 'Cửa hàng')
@section('body_class', 'page-shop')

@section('content')
    <section class="page-title">
        <div class="container page-title__inner">
            <div>
                <span class="eyebrow">Catalog</span>
                <h1>Cửa hàng</h1>
            </div>
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Trang chủ</a>
                <i data-lucide="chevron-right"></i>
                <span>Cửa hàng</span>
            </div>
        </div>
    </section>

    <section class="section section--catalog">
        <div class="container catalog-layout">
            <aside class="filter-panel">
                <div class="filter-head">
                    <h2>Bộ lọc</h2>
                    <button type="button">Xóa</button>
                </div>

                <div class="filter-group">
                    <h3>Danh mục</h3>
                    @foreach ($categories as $category)
                        <label class="check-row">
                            <input type="checkbox" {{ request('category') === $category['slug'] ? 'checked' : '' }}>
                            <span>{{ $category['name'] }}</span>
                            <small>{{ $category['count'] }}</small>
                        </label>
                    @endforeach
                </div>

                <div class="filter-group">
                    <h3>Khoảng giá</h3>
                    <input class="range" type="range" min="100000" max="3000000" value="1600000">
                    <div class="range-values">
                        <span>100k</span>
                        <span>3tr</span>
                    </div>
                </div>

                <div class="filter-group">
                    <h3>Màu sắc</h3>
                    <div class="swatches">
                        <button class="swatch swatch--black is-active" type="button" aria-label="Đen"></button>
                        <button class="swatch swatch--white" type="button" aria-label="Trắng"></button>
                        <button class="swatch swatch--green" type="button" aria-label="Xanh"></button>
                        <button class="swatch swatch--red" type="button" aria-label="Đỏ"></button>
                    </div>
                </div>

                <div class="filter-group">
                    <h3>Kích cỡ</h3>
                    <div class="size-grid">
                        <button type="button">S</button>
                        <button class="is-active" type="button">M</button>
                        <button type="button">L</button>
                        <button type="button">XL</button>
                    </div>
                </div>
            </aside>

            <div class="catalog-main">
                <div class="catalog-toolbar">
                    <p>Hiển thị <strong>{{ count($products) }}</strong> sản phẩm</p>
                    <div class="toolbar-actions">
                        <button class="icon-btn is-active" type="button" aria-label="Dạng lưới" title="Dạng lưới">
                            <i data-lucide="layout-grid"></i>
                        </button>
                        <button class="icon-btn" type="button" aria-label="Dạng danh sách" title="Dạng danh sách">
                            <i data-lucide="list"></i>
                        </button>
                        <select aria-label="Sắp xếp">
                            <option>Mới nhất</option>
                            <option>Giá tăng dần</option>
                            <option>Giá giảm dần</option>
                            <option>Bán chạy</option>
                        </select>
                    </div>
                </div>

                <div class="product-grid product-grid--catalog">
                    @foreach ($products as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                <nav class="pagination" aria-label="Phan trang">
                    <a class="is-active" href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" aria-label="Trang tiếp"><i data-lucide="arrow-right"></i></a>
                </nav>
            </div>
        </div>
    </section>
@endsection
