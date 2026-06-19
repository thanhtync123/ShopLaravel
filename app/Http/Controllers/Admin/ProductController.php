<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $rq)
    {
        $query = DB::table('products as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->select(
                'p.id',
                'c.name as category_name',
                'c.id as category_id',
                'p.name',
                'p.price',
                'p.quantity',
                'p.description',
                'p.image',
                'p.created_at',
                'p.updated_at'
            );

        if ($rq->keyword) {
            $query->where('p.name', 'like', "%$rq->keyword%");
        }

        $products = $query->orderBy('p.id', 'desc')
            ->paginate(10);

        $categories = DB::table('categories')->get();

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
        $image = null;
        if ($rq->hasFile('image'))
            $image = $rq->file('image')
                ->store('products', 'public');
        try {
            $sql = "
            INSERT INTO products
            (category_id, name, price, quantity, description, image)
            VALUES
            ($rq->category_id, '$rq->txb_name',$rq->nb_price,$rq->nb_quantity,'$rq->txb_description','$image')
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
            'txb_id' => 'required|string|max:100',
            'txb_name' => 'required|string|max:100',
            'nb_price' => 'required|numeric|min:1',
            'nb_quantity' => 'required|integer|min:1',
            'txb_description' => 'required|string|max:100'

        ]);
        try {
            $oldImage = DB::select(
                "SELECT image FROM products WHERE id = $rq->txb_id"
            )[0]->image;
            $image = $oldImage;
            if ($rq->hasFile('image')) {
                if ($oldImage != null)
                    Storage::disk('public')->delete($oldImage);
                $image = $rq->file('image')
                    ->store('products', 'public');
            }
            $sql = "
           UPDATE products 
            SET name = '$rq->txb_name', 
                price = $rq->nb_price, 
                quantity = $rq->nb_quantity, 
                description = '$rq->txb_description',
                category_id = '$rq->category_id',
                image = '$image'
           WHERE (id = $rq->txb_id);
            ";
            DB::update($sql);

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'product update successfully!');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $product = DB::select("SELECT image FROM products WHERE id = $id")[0];
            unlink(storage_path('app/public/' . $product->image));
            $sql = "
            DELETE FROM products WHERE id=$id;
            ";
            DB::delete($sql);
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'product delete successfully!');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
