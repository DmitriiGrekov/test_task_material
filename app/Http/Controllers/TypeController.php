<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('types.index', ['types' => $types]);
    }

    public function create(){
        return view('types.create');
    }

    public function store(TypeRequest $req){
        $name = $req->input('name');

        $type = new Type();
        $type->name = $name;
        $type->save();

        return redirect()->route('type.index');
    }

    public function update($id){
        $type = Type::findOrFail($id);
        return view('types.update', ['type' => $type]);
    }

    public function update_store(TypeRequest $req, $id){
        $type = Type::findOrFail($id);
        $type->name = $req->input('name');
        $type->save();
        return redirect()->route('type.index');
    }

    public function delete($id){
        $type = Type::findOrFail($id);
        return view('types.delete', ['type'=> $type]);
    }

    public function delete_store($id){
        Type::findOrFail($id)->delete();
        return redirect()->route('type.index');
    }
}
