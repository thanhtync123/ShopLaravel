@php
    $price = number_format($product['price'], 0, ',', '.') . 'đ';
    $oldPrice = $product['old_price'] ? number_format($product['old_price'], 0, ',', '.') . 'đ' : null;
@endphp

<article class="product-card">
    <div class="product-card__media">
        <a href="{{ route('product.show', $product['slug']) }}" aria-label="Xem {{ $product['name'] }}">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy">
        </a>
        <span class="product-badge">{{ $product['badge'] }}</span>
        <button class="icon-btn product-card__wish" type="button" aria-label="Yêu thích {{ $product['name'] }}" title="Yêu thích">
            <i data-lucide="heart"></i>
        </button>
    </div>
    <div class="product-card__body">
        <div class="product-meta">
            <span>{{ $product['category'] }}</span>
            <span><i data-lucide="star"></i>{{ $product['rating'] }}</span>
        </div>
        <h3><a href="{{ route('product.show', $product['slug']) }}">{{ $product['name'] }}</a></h3>
        <p>{{ $product['description'] }}</p>
        <div class="price-row">
            <strong>{{ $price }}</strong>
            @if ($oldPrice)
                <del>{{ $oldPrice }}</del>
            @endif
        </div>
        <div class="product-card__actions">
            <a class="btn btn--ghost" href="{{ route('product.show', $product['slug']) }}">Chi tiết</a>
            <button class="btn btn--primary" type="button" data-add-cart>
                <i data-lucide="shopping-cart"></i>
                Thêm
            </button>
        </div>
    </div>
</article>
