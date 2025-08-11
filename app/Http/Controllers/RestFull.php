<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RestFull extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Berhasil Mendaftar',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Berhasil Masuk',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Berhasil Keluar']);
    }

    public function categories()
    {
        $cate = Categories::all();
        $prod = Products::all();

        return response()->json([
            'categories' => $cate,
            'production' => $prod
        ]);
    }
    public function create_cate(Request $request)
    {
        $data = Categories::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
        return response()->json([
            'message' => "Berhasil Menambahkan Categories",
            'data' => $data
        ]);
    }

    public function products()
    {
        $cate = Categories::all();
        $prod = Products::all();

        return response()->json([
            'production' => $prod,
            'categories' => $cate
        ]);
    }
    public function create_prod(Request $request)
    {
        $data = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id
        ]);
        return response()->json([
            'message' => "Berhasil Menambahkan Products",
            'data' => $data
        ]);
    }

    public function update(string $type, string $id, Request $request)
    {
        if ($type == 'categories') {
            $data = Categories::find($id);
            $data->name = $request->name;
            $data->update();
            return response()->json([
                'message' => "Berhasil Diubah",
                'data' => $data
            ]);
        } else {
            $data = Products::find($id);
            $data->name = $request->name;
            $data->description = $request->description;
            $data->update();
            return response()->json([
                'message' => "Berhasil Diubah",
                'data' => $data
            ]);
        }
    }

    public function delete_cate(string $id)
    {
        $cate = Categories::find($id);
        $cate->delete();

        return response()->json([
            'message' => "Berhasil Dihapus",
            'data' => $cate
        ]);
    }

    public function delete_prod(string $id)
    {
        $prod = Products::find($id);
        $prod->delete();

        return response()->json([
            'message' => "Berhasil Dihapus",
            'data' => $prod
        ]);
    }
}
