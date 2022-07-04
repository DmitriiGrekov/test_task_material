<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $materials = Material::all();
        return view('main.index', ['materials' => $materials]);
    }

    public function search(Request $req){
        $search_text = $req->search;
        $materials = Material::where('name', 'LIKE', "%{$search_text}%")->get();
        return view('main.index', ['materials'=>$materials]);
    }
}
