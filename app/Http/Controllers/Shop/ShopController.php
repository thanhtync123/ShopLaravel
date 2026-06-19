<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    public function index()
    {
       $categories = DB::select("
            SELECT
                c.id,
                c.name,
                COUNT(p.id) AS product_count
            FROM categories c
            LEFT JOIN products p
                ON c.id = p.category_id
            GROUP BY c.id, c.name
            ORDER BY c.id
        ");
        $products = DB::select("
        SELECT *
        FROM products
        ORDER BY id DESC
    ");
        return view(
            'shop.index',
            compact('categories', 'products')
        );
    }
}
