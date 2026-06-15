<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

$categories = [
    [
        'name' => 'Sneakers',
        'slug' => 'sneakers',
        'count' => 128,
        'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'name' => 'Phụ kiện',
        'slug' => 'phu-kien',
        'count' => 84,
        'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'name' => 'Thời trang',
        'slug' => 'thoi-trang',
        'count' => 216,
        'image' => 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'name' => 'Lifestyle',
        'slug' => 'lifestyle',
        'count' => 62,
        'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=900&q=80',
    ],
];

$products = [
    [
        'id' => 1,
        'name' => 'Aero Knit Runner',
        'slug' => 'aero-knit-runner',
        'category' => 'Sneakers',
        'price' => 1290000,
        'old_price' => 1790000,
        'badge' => '-28%',
        'rating' => 4.9,
        'reviews' => 128,
        'stock' => 'Còn hàng',
        'color' => 'Đen / bạc',
        'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80',
        'description' => 'Giày sneaker knit nhẹ, đệm êm, đế cao su bám tốt cho ngày dài di chuyển.',
    ],
    [
        'id' => 2,
        'name' => 'Pulse Wireless Headphone',
        'slug' => 'pulse-wireless-headphone',
        'category' => 'Phụ kiện',
        'price' => 2190000,
        'old_price' => 2590000,
        'badge' => 'Hot',
        'rating' => 4.8,
        'reviews' => 94,
        'stock' => 'Còn hàng',
        'color' => 'Trắng',
        'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=900&q=80',
        'description' => 'Tai nghe không dây chống ồn chủ động, pin 36 giờ, âm bass gọn và mic rõ.',
    ],
    [
        'id' => 3,
        'name' => 'Metro Daypack 22L',
        'slug' => 'metro-daypack-22l',
        'category' => 'Lifestyle',
        'price' => 890000,
        'old_price' => 1190000,
        'badge' => 'Moi',
        'rating' => 4.7,
        'reviews' => 76,
        'stock' => 'Còn hàng',
        'color' => 'Olive',
        'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=900&q=80',
        'description' => 'Balo đô thị 22L, ngăn laptop riêng, vải chống trượt nước và quai đệm thoáng.',
    ],
    [
        'id' => 4,
        'name' => 'Luna Classic Watch',
        'slug' => 'luna-classic-watch',
        'category' => 'Phụ kiện',
        'price' => 1650000,
        'old_price' => null,
        'badge' => 'Best',
        'rating' => 4.9,
        'reviews' => 152,
        'stock' => 'Còn hàng',
        'color' => 'Nâu da',
        'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80',
        'description' => 'Đồng hồ mặt tối giản, dây da thật, kính khoáng và chống nước sinh hoạt.',
    ],
    [
        'id' => 5,
        'name' => 'Canvas Overshirt',
        'slug' => 'canvas-overshirt',
        'category' => 'Thời trang',
        'price' => 740000,
        'old_price' => 920000,
        'badge' => '-20%',
        'rating' => 4.6,
        'reviews' => 63,
        'stock' => 'Còn hàng',
        'color' => 'Kem',
        'image' => 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=900&q=80',
        'description' => 'Áo khoác overshirt canvas đứng form, túi hộp gọn và chất vải thoáng.',
    ],
    [
        'id' => 6,
        'name' => 'Nova Sunglasses',
        'slug' => 'nova-sunglasses',
        'category' => 'Phụ kiện',
        'price' => 590000,
        'old_price' => null,
        'badge' => 'UV400',
        'rating' => 4.8,
        'reviews' => 88,
        'stock' => 'Còn hàng',
        'color' => 'Smoke',
        'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?auto=format&fit=crop&w=900&q=80',
        'description' => 'Kính râm gọng nhẹ, tròng kính UV400, hợp mặt để đi chơi và du lịch.',
    ],
    [
        'id' => 7,
        'name' => 'Studio Camera Sling',
        'slug' => 'studio-camera-sling',
        'category' => 'Lifestyle',
        'price' => 1340000,
        'old_price' => 1590000,
        'badge' => '-16%',
        'rating' => 4.7,
        'reviews' => 45,
        'stock' => 'Sắp hết',
        'color' => 'Xám',
        'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=900&q=80',
        'description' => 'Túi đeo chéo cho máy ảnh, lót chống sốc, chia ngăn linh hoạt và dây đeo mềm.',
    ],
    [
        'id' => 8,
        'name' => 'Trail Bottle 750ml',
        'slug' => 'trail-bottle-750ml',
        'category' => 'Lifestyle',
        'price' => 390000,
        'old_price' => 490000,
        'badge' => '-20%',
        'rating' => 4.5,
        'reviews' => 51,
        'stock' => 'Còn hàng',
        'color' => 'Teal',
        'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=900&q=80',
        'description' => 'Bình giữ nhiệt inox 750ml, nắp kín, giữ lạnh 24 giờ và vừa ngăn balo.',
    ],
];

View::share('categories', $categories);
View::share('products', $products);

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/shop', function () {
    return view('shop.index');
})->name('shop');

Route::get('/san-pham/{slug}', function (string $slug) use ($products) {
    $product = collect($products)->firstWhere('slug', $slug);

    abort_unless($product, 404);

    return view('shop.product', compact('product'));
})->name('product.show');

Route::get('/cart', function () {
    return view('shop.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('shop.checkout');
})->name('checkout');

Route::get('/account', function () {
    return view('shop.account');
})->name('account');

Route::get('/contact', function () {
    return view('shop.contact');
})->name('contact');
