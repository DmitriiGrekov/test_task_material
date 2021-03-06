<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TypeController;
use App\Models\Material;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/search', [MainController::class, 'search'])->name('main.search');

Route::prefix('material')->group(function(){
    Route::get('/detail/{id}', [MaterialController::class, 'show'])->name('material.detail')->whereNumber('id');
    Route::get('/create', [MaterialController::class, 'create'])->name('material.create');
    Route::post('/create', [MaterialController::class, 'store'])->name('material.store');
    Route::post('/detail/{id}/add/tag', [MaterialController::class, 'addTag'])->name('material.add_tag')->whereNumber('id');
    Route::get('/detail/{id}/delete/tag/{tag_id}', [MaterialController::class, 'deleteTag'])->name('material.delete_tag')->whereNumber('id', 'tag_id');
    Route::get('/detail/{id}/link/add', [MaterialController::class, 'createLink'])->name('material.create_link')->whereNumber('id');
    Route::post("/detail/link/add", [MaterialController::class, 'storeLink'])->name('material.store_link');
    Route::get("/detail/link/delete/{id}", [MaterialController::class, 'deleteLink'])->name('material.delete_link')->whereNumber('id');
    Route::get('/detail/{material_id}/link/update/{link_id}', [MaterialController::class, 'updateLink'])->name('material.update_link')->whereNumber("link_id", 'material_id');
    Route::post('/detail/link/update/{link_id}', [MaterialController::class, 'updateLinkStore'])->name('material.update_link_store')->whereNumber("link_id");
    Route::get('/delete/{id}', [MaterialController::class, 'delete'])->name("material.delete")->whereNumber('id');
    Route::post('/delete/{id}', [MaterialController::class, 'deleteStore'])->name('material.delete_store')->whereNumber('id');
    Route::get('/update/{id}', [MaterialController::class, 'update'])->name('material.update')->whereNumber('id');
    Route::post('/update/{id}', [MaterialController::class, 'updateStore'])->name('material.update_store')->whereNumber('id');
});

Route::prefix('category')->group(function(){
    Route::get('/list', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/delete/{cat_id}', [CategoryController::class, 'delete'])->name('category.delete')->whereNumber('cat_id');
    Route::post('/delete/{cat_id}', [CategoryController::class, 'deleteStore'])->name('category.delete_store')->whereNumber('cat_id');
    Route::get('/update/{cat_id}', [CategoryController::class, 'categoryUpdate'])->name('category.update')->whereNumber('cat_id');
    Route::post('/update/{cat_id}', [CategoryController::class, 'categoryUpdateStore'])->name('category.update')->whereNumber('cat_id');
});

Route::prefix('tag')->group(function(){
    Route::get('/list', [TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/create', [TagController::class, 'store'])->name('tag.store');
    Route::get('/delete/{tag_id}', [TagController::class, 'delete'])->name('tag.delete')->whereNumber('tag_id');
    Route::post('/delete/{tag_id}', [TagController::class, 'deleteStore'])->name('tag.delete_store')->whereNumber('tag_id');
    Route::get('/update/{tag_id}', [TagController::class, 'tagUpdate'])->name('tag.update')->whereNumber('tag_id');
    Route::post('/update/{tag_id}', [TagController::class, 'tagUpdateStore'])->name('tag.update')->whereNumber('tag_id');
    Route::get('/filter/{tag_id}', [TagController::class, 'filter'])->name('tag.filter')->whereNumber('tag_id');
});

Route::prefix('type')->group(function(){
    Route::get('/list', [TypeController::class, 'index'])->name('type.index');
    Route::get('/add', [TypeController::class, 'create'])->name('type.create');
    Route::post('/add', [TypeController::class, 'store'])->name('type.store');
    Route::get('/update/{id}', [TypeController::class, 'update'])->name('type.update')->whereNumber('id');
    Route::post('/update/{id}', [TypeController::class, 'updateStore'])->name('type.update_store')->whereNumber('id');
    Route::get('/delete/{id}', [TypeController::class, 'delete'])->name('type.delete')->whereNumber('id');
    Route::post('/delete/{id}', [TypeController::class, 'deleteStore'])->name('type.delete_store')->whereNumber('id');
});
