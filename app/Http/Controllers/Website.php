<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Website extends Controller
{
    public function dashboard()
    {
        if(!Auth::check()){
            return redirect('/signin');
        }
        if (Auth::user()->role == 'admin') {
            return redirect('/categories');
        } else {
            return redirect('/products');
        }
    }

    public function categories()
    {
        $cate = Categories::all();
        $prod = Products::all();

        return view('categories', [
            'cate' => $cate,
            'prod' => $prod
        ]);
    }

    public function products()
    {
        $cate = Categories::all();
        $prod = Products::all();

        return view('products', [
            'cate' => $cate,
            'prod' => $prod
        ]);
    }

    public function create_cate(Request $request)
    {
        Categories::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/categories');
    }

    public function delete_cate(string $id)
    {
        $cate = Categories::find($id);
        $cate->delete();

        return redirect('/categories');
    }

    public function delete_prod(string $id)
    {
        $cate = Products::find($id);
        $cate->delete();

        return redirect('/products');
    }



    public function edit_show(string $type, string $id)
    {
        if ($type == 'categories') {
            $data = Categories::find($id);
            return view('update_cate', [
                'data' => $data
            ]);
        } else {
            $data = Products::find($id);
            return view('update_prod', [
                'data' => $data
            ]);
        }
    }

    public function update(string $type, string $id, Request $request)
    {
        if ($type == 'categories') {
            $data = Categories::find($id);
            $data->name = $request->name;
            $data->update();
            return redirect('/categories');
        } else {
            $data = Products::find($id);
            $data->name = $request->name;
            $data->description = $request->description;
            $data->update();
            return redirect('/products');
        }
    }



    public function create_prod(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Ambil ekstensi file
            $extension = $file->getClientOriginalExtension();

            // Buat nama unik
            $filename = uniqid() . '_' . time() . '.' . $extension;

            // Simpan ke folder public/uploads
            $file->move(public_path('uploads'), $filename);

            Products::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $filename,
                'category_id' => $request->category,
                'user_id' => Auth::user()->id
            ]);
        }


        return redirect('/products');
    }

}
