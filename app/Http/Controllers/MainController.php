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
}
