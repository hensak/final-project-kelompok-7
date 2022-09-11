<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return view('category.index', compact('category'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required',
        ]);

        Category::create([
          'nama' => $request->category_name
        ]);
        return redirect('/category');
    }

    public function edit(Category $categoryEdit) {
        $category = Category::all();
        $showEdit = true;
        return view('category.index', compact('categoryEdit', 'category', 'showEdit'));
    }

    public function update(Request $request, Category $categoryEdit) {
        $request->validate([
            'category_name' => 'required|unique:categories,nama',
        ]);

        $categoryEdit->nama = $request->category_name;
        $categoryEdit->update();
        return redirect('/category');
    }

    public function destroy(Category $category) {
        // $cast = Cast::find($id);
        $category->delete();
        return redirect('/category');
    }
}
