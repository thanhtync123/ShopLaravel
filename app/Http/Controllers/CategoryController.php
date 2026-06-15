<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:3',
        ]);
        DB::table('categories')->insert([
            'name' => $validated['category_name']
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
}
