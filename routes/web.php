<?php

use App\Http\Controllers\AuthCont;
use App\Http\Controllers\Website;
use Illuminate\Support\Facades\Route;

Route::get('/', [Website::class, 'dashboard']);

Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('login');

Route::get('logout', [AuthCont::class, 'logout']);

Route::get('error', [AuthCont::class, 'Error']);

Route::get('/signin', [AuthCont::class, 'signin_view']);
Route::post('/auth/signin', [AuthCont::class, 'signin']);

Route::get('/signup', [AuthCont::class, 'signup_view']);
Route::post('/auth/signup', [AuthCont::class, 'signup']);

Route::get('/categories', [Website::class, 'categories']);
Route::post('/create_cate', [Website::class, 'create_cate']);
Route::get('/update/{type}/{id}', [Website::class, 'edit_show']);
Route::post('/update/{type}/{id}', [Website::class, 'update']);
Route::get('/delete_cate/{id}', [Website::class, 'delete_cate']);

Route::get('/products', [Website::class, 'products']);
Route::post('/create_prod', [Website::class, 'create_prod']);
Route::get('/delete_prod/{id}', [Website::class, 'delete_prod']);