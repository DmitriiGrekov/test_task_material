<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(CategoryRequest $req){
        $name = $req->input('name');
        $cat = new Category();
        $cat -> name = $name;
        $cat -> save();

        return redirect()->route('category.index');
    }

    public function delete($cat_id){
        $category = Category::findOrFail($cat_id);
        return view('categories.delete', ['category'=>$category]);
    }

    public function delete_store($cat_id){
        Category::findOrFail($cat_id)->delete();
        return redirect()->route('category.index');
    }

    public function category_update($cat_id){
        $cat = Category::findOrFail($cat_id);
        return view('categories.update', ['category'=>$cat]);
    }

    public function category_update_store(CategoryRequest $req, $cat_id){
        $name = $req->input('name');
        $cat = Category::findOrFail($cat_id);

        $cat -> name = $name;
        $cat -> save();

        return redirect()->route('category.index');
    }
}
