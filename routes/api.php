<?php

use App\Http\Controllers\RestFull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/signup', [RestFull::class, 'signup']);
Route::post('/signin', [RestFull::class, 'signin']);
Route::post('/logout', [RestFull::class, 'logout']);

Route::get('/categories', [RestFull::class, 'categories']);
Route::post('/create_cate', [RestFull::class, 'create_cate']);
Route::get('/delete_cate/{id}', [RestFull::class, 'delete_cate']);

Route::post('/update/{type}/{id}', [RestFull::class, 'update']);

Route::get('/products', [RestFull::class, 'products']);
Route::post('/create_prod', [RestFull::class, 'create_prod']);
Route::get('/delete_prod/{id}', [RestFull::class, 'delete_prod']);