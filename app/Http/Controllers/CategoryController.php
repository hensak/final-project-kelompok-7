<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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
        Alert::success('Success', 'Category has been updated!');
        return redirect('/category');
    }

    public function destroy(Category $category) {
        // $cast = Cast::find($id);
        $category->delete();
        Alert::warning('Warning', 'Category has been deleted.');
        return redirect('/category');
    }
}
