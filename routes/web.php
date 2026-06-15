<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\CategoryController;
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

Route::get('/admin', function () use ($products) {
    $stats = [
        [
            'label' => 'Doanh thu',
            'value' => '128.4tr',
            'trend' => '+12.8%',
            'icon' => 'wallet-cards',
            'tone' => 'coral',
        ],
        [
            'label' => 'Đơn hàng',
            'value' => '846',
            'trend' => '+8.2%',
            'icon' => 'shopping-cart',
            'tone' => 'teal',
        ],
        [
            'label' => 'Khách hàng',
            'value' => '3,214',
            'trend' => '+5.4%',
            'icon' => 'users-round',
            'tone' => 'violet',
        ],
        [
            'label' => 'Tồn kho thấp',
            'value' => '18',
            'trend' => '-3 sp',
            'icon' => 'package-search',
            'tone' => 'amber',
        ],
    ];

    $orders = [
        ['code' => '#LS-1048', 'customer' => 'Minh Anh', 'items' => 'Aero Knit Runner', 'total' => '1.290.000đ', 'status' => 'Đã giao', 'status_class' => 'success', 'time' => '09:42'],
        ['code' => '#LS-1047', 'customer' => 'Quang Huy', 'items' => 'Pulse Wireless Headphone', 'total' => '2.190.000đ', 'status' => 'Đang xử lý', 'status_class' => 'warning', 'time' => '09:18'],
        ['code' => '#LS-1046', 'customer' => 'Thanh Ngân', 'items' => 'Metro Daypack 22L', 'total' => '890.000đ', 'status' => 'Chờ thanh toán', 'status_class' => 'muted', 'time' => '08:56'],
        ['code' => '#LS-1045', 'customer' => 'Đức Bảo', 'items' => 'Luna Classic Watch', 'total' => '1.650.000đ', 'status' => 'Đã giao', 'status_class' => 'success', 'time' => '08:31'],
    ];

    $topProducts = collect($products)->take(4)->values()->map(function ($product, $index) {
        $sold = [214, 187, 142, 128][$index];
        $stockPercent = [78, 62, 48, 36][$index];

        return array_merge($product, [
            'sold' => $sold,
            'stock_percent' => $stockPercent,
        ]);
    });

    $tasks = [
        ['label' => 'Duyệt 12 đơn mới', 'done' => false],
        ['label' => 'Cập nhật banner khuyến mãi', 'done' => true],
        ['label' => 'Kiểm tra 18 sản phẩm sắp hết', 'done' => false],
        ['label' => 'Trả lời 7 ticket hỗ trợ', 'done' => false],
    ];

    $activities = [
        ['text' => 'Đơn #LS-1048 đã chuyển sang trạng thái đã giao', 'time' => '10 phút trước'],
        ['text' => 'Sản phẩm Aero Knit Runner tăng 24 lượt xem', 'time' => '34 phút trước'],
        ['text' => 'Khách Minh Anh vừa tạo tài khoản mới', 'time' => '1 giờ trước'],
    ];

    return view('admin.dashboard', compact('stats', 'orders', 'topProducts', 'tasks', 'activities'));
})->name('admin.dashboard');

Route::get('/admin/product', function () use ($products) {
    $productStats = [
        [
            'label' => 'Tổng sản phẩm',
            'value' => '248',
            'trend' => '+14 mới',
            'icon' => 'package',
            'tone' => 'teal',
        ],
        [
            'label' => 'Đang bán',
            'value' => '216',
            'trend' => '87%',
            'icon' => 'badge-check',
            'tone' => 'coral',
        ],
        [
            'label' => 'Sắp hết hàng',
            'value' => '18',
            'trend' => 'Cần nhập',
            'icon' => 'triangle-alert',
            'tone' => 'amber',
        ],
        [
            'label' => 'Ẩn khỏi shop',
            'value' => '14',
            'trend' => '-2 tuần này',
            'icon' => 'eye-off',
            'tone' => 'violet',
        ],
    ];

    $categoryNames = [
        'aero-knit-runner' => 'Sneakers',
        'pulse-wireless-headphone' => 'Phụ kiện',
        'metro-daypack-22l' => 'Lifestyle',
        'luna-classic-watch' => 'Phụ kiện',
        'canvas-overshirt' => 'Thời trang',
        'nova-sunglasses' => 'Phụ kiện',
        'studio-camera-sling' => 'Lifestyle',
        'trail-bottle-750ml' => 'Lifestyle',
    ];

    $inventory = [
        'aero-knit-runner' => ['sku' => 'SNK-1024', 'quantity' => 42, 'sold' => 214, 'status' => 'Đang bán', 'status_class' => 'success', 'stock_percent' => 78],
        'pulse-wireless-headphone' => ['sku' => 'ACC-2208', 'quantity' => 35, 'sold' => 187, 'status' => 'Đang bán', 'status_class' => 'success', 'stock_percent' => 64],
        'metro-daypack-22l' => ['sku' => 'LFS-3312', 'quantity' => 24, 'sold' => 142, 'status' => 'Đang bán', 'status_class' => 'success', 'stock_percent' => 52],
        'luna-classic-watch' => ['sku' => 'ACC-4471', 'quantity' => 18, 'sold' => 128, 'status' => 'Đang bán', 'status_class' => 'success', 'stock_percent' => 46],
        'canvas-overshirt' => ['sku' => 'FAS-5106', 'quantity' => 12, 'sold' => 96, 'status' => 'Sắp hết', 'status_class' => 'warning', 'stock_percent' => 28],
        'nova-sunglasses' => ['sku' => 'ACC-6120', 'quantity' => 9, 'sold' => 88, 'status' => 'Sắp hết', 'status_class' => 'warning', 'stock_percent' => 22],
        'studio-camera-sling' => ['sku' => 'LFS-7064', 'quantity' => 6, 'sold' => 45, 'status' => 'Tạm ẩn', 'status_class' => 'muted', 'stock_percent' => 16],
        'trail-bottle-750ml' => ['sku' => 'LFS-8158', 'quantity' => 31, 'sold' => 51, 'status' => 'Đang bán', 'status_class' => 'success', 'stock_percent' => 58],
    ];

    $productRows = collect($products)->map(function ($product) use ($categoryNames, $inventory) {
        $meta = $inventory[$product['slug']] ?? ['sku' => 'SKU-DEMO', 'quantity' => 0, 'sold' => 0, 'status' => 'Nháp', 'status_class' => 'muted', 'stock_percent' => 0];

        return array_merge($product, $meta, [
            'category_label' => $categoryNames[$product['slug']] ?? $product['category'],
            'revenue' => $product['price'] * $meta['sold'],
        ]);
    });

    $categoryFilters = ['Tất cả', 'Sneakers', 'Phụ kiện', 'Thời trang', 'Lifestyle'];

    return view('admin.product', compact('productStats', 'productRows', 'categoryFilters'));
})->name('admin.product');

Route::get('/contact', function () {
    return view('shop.contact');
})->name('contact');

Route::prefix('admin')->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});