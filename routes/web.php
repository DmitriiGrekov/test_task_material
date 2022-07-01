<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TagController;
use App\Models\Material;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::prefix('material')->group(function(){
    Route::get('/detail/{id}', [MaterialController::class, 'show'])->name('material.detail')->whereNumber('id');
    Route::get('/create', [MaterialController::class, 'create'])->name('material.create');
    Route::post('/create', [MaterialController::class, 'store'])->name('material.store');
    Route::post('/detail/{id}/add/tag', [MaterialController::class, 'add_tag'])->name('material.add_tag')->whereNumber('id');
    Route::get('/detail/{id}/delete/tag/{tag_id}', [MaterialController::class, 'delete_tag'])->name('material.delete_tag')->whereNumber('id', 'tag_id');
    Route::get('/detail/{id}/link/add', [MaterialController::class, 'create_link'])->name('material.create_link')->whereNumber('id');
    Route::post("/detail/link/add", [MaterialController::class, 'store_link'])->name('material.store_link');
    Route::get("/detail/link/delete/{id}", [MaterialController::class, 'delete_link'])->name('material.delete_link')->whereNumber('id');
    Route::get('/detail/{material_id}/link/update/{link_id}', [MaterialController::class, 'update_link'])->name('material.update_link')->whereNumber("link_id", 'material_id');
    Route::post('/detail/link/update/{link_id}', [MaterialController::class, 'update_link_store'])->name('material.update_link_store')->whereNumber("link_id");
});

Route::prefix('category')->group(function(){
    Route::get('/list', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/delete/{cat_id}', [CategoryController::class, 'delete'])->name('category.delete')->whereNumber('cat_id');
    Route::get('/update/{cat_id}', [CategoryController::class, 'category_update'])->name('category.update')->whereNumber('cat_id');
    Route::post('/update/{cat_id}', [CategoryController::class, 'category_update_store'])->name('category.update')->whereNumber('cat_id');
});

Route::prefix('tag')->group(function(){
    Route::get('/list', [TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/create', [TagController::class, 'store'])->name('tag.store');
    Route::get('/delete/{cat_id}', [TagController::class, 'delete'])->name('tag.delete')->whereNumber('tag_id');
    Route::get('/update/{cat_id}', [TagController::class, 'tag_update'])->name('tag.update')->whereNumber('tag_id');
    Route::post('/update/{cat_id}', [TagController::class, 'tag_update_store'])->name('tag.update')->whereNumber('tag_id');
});
