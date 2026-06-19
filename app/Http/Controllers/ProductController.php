<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
        public function index()
    {
        $products = DB::select("
            SELECT p.id,
                c.name AS category_name,
                p.name,
                p.price,
                p.quantity,
                p.description,
                p.image,
                p.created_at,
                p.updated_at
            FROM products p
            INNER JOIN categories c
                ON p.category_id = c.id
            ORDER BY ID DESC
        ");

       $categories = DB::select("
        SELECT id, name
        FROM categories
            ");
    return view('admin.product.index', compact('products', 'categories'));
    }
    public function create(Request $rq)
    {   
        $rq->validate([
                // 'txb_id' => 'required|string|max:100',
                'txb_name' => 'required|string|max:100',
                'nb_price' => 'required|numeric|min:1',
                'nb_quantity' => 'required|integer|min:1',
                'txb_description' => 'required|string|max:100'

            ]);
        try {
            $sql = "
            INSERT INTO products
            (category_id, name, price, quantity, description, image)
            VALUES
            ($rq->category_id, '$rq->txb_name',$rq->nb_price,$rq->nb_quantity,'$rq->description',NULL)
            ";
            DB::insert($sql);

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'product created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
            }
        // return $rq;
    }
     public function update(Request $rq)
    {   
        $rq->validate([
                // 'txb_id' => 'required|string|max:100',
                'txb_name' => 'required|string|max:100',
                'nb_price' => 'required|numeric|min:1',
                'nb_quantity' => 'required|integer|min:1',
                'txb_description' => 'required|string|max:100'

            ]);
        try {
            $sql = "
           
            ";
            DB::update($sql);

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'product update successfully!');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
            }
        // return $rq;
    }
}
