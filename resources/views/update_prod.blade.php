<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('styles/signin.css') }}">
</head>

<body>
    <div class="box">
        <!-- From Uiverse.io by nathann09 -->

        <form class="form" method="POST" action="/update/products/{{ $data->id }}">
            @csrf
            <p class="form-title">Update Products</p>
            <div class="input-container">
                <input type="text" value="{{ $data->name }}" name="name">
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="text" value="{{ $data->description }}" name="description">
            </div>
            <button type="submit" class="submit">
                Update Sekarang
            </button>
        </form>

    </div>
</body>

</html>