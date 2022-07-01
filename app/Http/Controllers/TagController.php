<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function index(){
        $tag = Tag::all();
        return view('tags.index', ['tags' => $tag]);
    }

    public function create(){
        return view('tags.create');
    }

    public function store(TagRequest $req){
        $name = $req->input('name');
        $tag = new Tag();
        $tag -> name = $name;
        $tag -> save();

        return redirect()->route('tag.index');
    }

    public function delete($tag_id){
        Tag::findOrFail($tag_id)->delete();
        return redirect()->back();
    }

    public function tag_update($tag_id){
        $tag = Tag::findOrFail($tag_id);
        return view('tags.update', ['tag'=>$tag]);
    }

    public function tag_update_store(TagRequest $req, $tag_id){
        $name = $req->input('name');
        $tag = Tag::findOrFail($tag_id);

        $tag -> name = $name;
        $tag -> save();

        return redirect()->route('tag.index');
    }
}
