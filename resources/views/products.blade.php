<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/cc8eb8fa05.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('styles/dashboard.css')}}">
</head>

<body>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">Dashboard</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li id="desktop"><a href="/categories">Categories</a></li>
                <li id="desktop"><a href="/products">Products</a></li>
                <li id="desktop"><a href="/logout">Logout</a></li>
                <li id="mobile">
                    <details>
                        <summary>Menu</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a>Categories</a></li>
                            <li><a>Products</a></li>
                            <li><a>Logout</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>

    <div class="menus">
        <a href="/categories" class="data">
            <p>Categories</p>
            <h2>{{ count($cate) }}</h2>
        </a>

        <a href="/products" class="data">
            <p>Products</p>
            <h2>{{ count($prod) }}</h2>
        </a>
    </div>

    <h1>Products</h2>

        <div class="create">
            <button class="btn" onclick="my_modal_1.showModal()" id="buat">Tambah</button>
            <dialog id="my_modal_1" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Tambah Products</h3>
                    <form action="/create_prod" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <label>
                            <p>name</p>
                            <input type="text" name="name">
                        </label>
                        <label>
                            <p>Description</p>
                            <input type="text" name="description">
                        </label>
                        <label>
                            <p>Image</p>
                            <input type="file" name="image">
                        </label>
                        <label>
                            <p>Categories</p>
                            <select name="category">
                                @foreach ($cate as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <button type="submit" id="tambah">Tambah</button>
                    </form>
                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>
        </div>

        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Updated At</th>
                        <th>Created At</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prod as $item)
                    <tr>
                        <th>1</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/update/products/{{ $item->id }}" id="edit"><i class="fa-solid fa-square-pen"></i></a>
                            <a href="/delete_prod/{{ $item->id }}" id="hapus"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</body>

</html>