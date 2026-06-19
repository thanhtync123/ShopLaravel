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
        
            $request->validate([
                'category_name' => 'required|string|max:100'
            ]);
        try {
            DB::table('categories')->insert([
                'name' => $request->category_name
            ]);
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
            }
    }
    public function edit($category)
    {
        $category = Category::findOrFail($category);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $category)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:100',
        ]);
        try{
            DB::table('categories')->where('id', $category)->update([
                        'name' => $validated['category_name']
        ]);
        }
        catch(\Exception $e){
            return back()->withErrors($e->getMessage());
        }
      
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }
    public function destroy($category)
    {
        DB::table('categories')->where('id', $category)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}


