<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Http\Requests\MaterialRequest;
use App\Models\Category;
use App\Models\Link;
use App\Models\Material;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function show($id){
        $material = Material::findOrFail($id);
        $tags = Tag::all();
        return view('materials.detail', ['material' => $material, 'tags' => $tags]);
    }

    public function create(){
        $types = Type::all();
        $categories = Category::all();
        return view('materials.create', ['types' => $types, 'categories' => $categories]);
    }

    public function store(MaterialRequest $req){
        $type_id = $req->input('type_id');
        $category_id = $req->input('category_id');
        $name = $req->input('name');
        $author = $req->input('author');
        $description = $req->input('description');


        if(!is_numeric($type_id) or !is_numeric($category_id)){
            return redirect()->back()->withErrors(['msg' => 'Выберите занчение'])->withInput();
        }

        $material = new Material();
        $material -> type_id = $type_id;
        $material -> category_id = $category_id;
        $material -> name = $name;
        $material -> author = $author;
        $material -> description = $description;

        $material -> save();

        return redirect()->route('material.detail', $material->id);
    }

    public function addTag(Request $req, $id){

        $material = Material::findOrFail($id);

        $tag_id = $req->input('tag_id');

        $material->tags()->attach($tag_id);
        return redirect()->back();
    }

    public function deleteTag($id, $tag_id){
        $tag = Tag::findOrFail($tag_id);
        $material = Material::findOrFail($id);

        $material->tags()->detach($tag);

        return redirect()->back();
    }

    public function createLink($id){

        return view('materials.create_link', ['id' => $id]);

    }

    public function storeLink(LinkRequest $req){
        $material_id = $req->input('material_id');
        $name = $req->input('name');
        $link = $req->input('link');

        $new_link = new Link();
        $new_link -> name = $name;
        $new_link -> link = $link;
        $new_link -> material_id = $material_id;
        $new_link -> save();

        return redirect()->route('material.detail', $material_id);

    }

    public function deleteLink($id){
        $link = Link::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function updateLink($material_id, $link_id){
        $link = Link::findOrFail($link_id);
        return view('materials.update_link', ['id' => $material_id, 'link' => $link]);
    }

    public function updateLinkStore(LinkRequest $req, $link_id){
        $link = Link::findOrFail($link_id);
        $material_id = $req->input('material_id');
        $name = $req->input('name');
        $link_text = $req->input('link');

        $link->name = $name;
        $link->link = $link_text;
        $link->save();
        return redirect()->route('material.detail', $material_id);

    }

    public function delete($id){
        $material = Material::findOrFail($id);
        return view('materials.delete', ['material'=>$material]);
    }

    public function deleteStore(Request $req, $id){
        Material::findOrFail($id)->delete();
        return redirect()->route('main.index');
    }

    public function update($id){
        $material = Material::findOrFail($id);
        $types = Type::all();
        $categories = Category::all();
        return view('materials.update', [
            'material'=>$material,
            'types'=>$types,
            'categories'=>$categories]);;
    }

    public function updateStore(MaterialRequest $req, $id){
        $type_id = $req->input('type_id');
        $category_id = $req->input('category_id');
        $name = $req->input('name');
        $author = $req->input('author');
        $description = $req->input('description');


        if(!is_numeric($type_id) or !is_numeric($category_id)){
            return redirect()->back()->withErrors(['msg' => 'Выберите занчение'])->withInput();
        }

        $material = Material::findOrFail($id);
        $material -> type_id = $type_id;
        if(!($material -> category_id == $category_id)){
            $material -> category_id = $category_id;
        }
        $material -> name = $name;
        $material -> author = $author;
        $material -> description = $description;

        $material -> save();
        return redirect()->route('material.detail', $material->id);


    }
}
