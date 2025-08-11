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

        <form class="form" method="POST" action="/auth/signin">
            @csrf
            <p class="form-title">Sign in to your account</p>
            <div class="input-container">
                <input type="email" placeholder="Enter email" name="email">
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="password" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="submit">
                Sign in
            </button>

            <p class="signup-link">
                No account?
                <a href="/signup">Sign up</a>
            </p>
        </form>

    </div>
</body>

</html>