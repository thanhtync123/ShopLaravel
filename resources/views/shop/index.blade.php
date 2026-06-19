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
            <a href="index.html">Trang chủ</a>
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
                @foreach($categories as $ct)
                <label class="check-row">
                    <input type="checkbox">
                    <span>{{$ct->name}}</span>
                    <small>{{$ct->product_count}}</small>
                </label>
                @endforeach
            </div>

            <div class="filter-group">
                <h3>Khoảng giá</h3>
                <input class="range" type="range" min="100000" max="3000000" value="1600000">
            </div>
        </aside>

        <!-- Danh sách sản phẩm -->
        <div class="catalog-main">

            <div class="catalog-toolbar">
                <p>Hiển thị <strong>6</strong> sản phẩm</p>

                <select>
                    <option>Mới nhất</option>
                    <option>Giá tăng dần</option>
                    <option>Giá giảm dần</option>
                </select>
            </div>

            <div class="product-grid product-grid--catalog">

                @foreach($products as $item)
                <div class="product-card">

                    <img src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->name }}">

                    <h3>{{ $item->name }}</h3>

                    <p>{{ number_format($item->price, 0, ',', '.') }}đ</p>

                </div>
                @endforeach

            </div>

            <nav class="pagination">
                <a class="is-active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
            </nav>

        </div>
    </div>
</section>
@endsection