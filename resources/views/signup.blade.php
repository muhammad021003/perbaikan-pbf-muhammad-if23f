<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('styles/signup.css') }}">
</head>

<body>
    <div class="box">
        <!-- From Uiverse.io by nathann09 -->

        <!-- From Uiverse.io by Yaya12085 -->
        <form class="form" method="POST" action="/auth/signup">
            @csrf
            <p class="title">Register </p>
            <p class="message">Signup now and get full access to our app. </p>
            <div class="flex">
                <label>
                    <input required="" placeholder="" type="text" class="input" name="first">
                    <span>Firstname</span>
                </label>

                <label>
                    <input required="" placeholder="" type="text" class="input" name="last">
                    <span>Lastname</span>
                </label>
            </div>

            <label>
                <input required="" placeholder="" type="email" class="input" name="email">
                <span>Email</span>
            </label>

            <label>
                <input required="" placeholder="" type="password" class="input" name="password">
                <span>Password</span>
            </label>
            <label>
                <input required="" placeholder="" type="password" class="input" name="password_confirmation">
                <span>Confirm password</span>
            </label>
            <button class="submit" type="submit">Submit</button>
            <p class="signin">Already have an acount ? <a href="/signin">Signin</a> </p>
        </form>

    </div>
</body>

</html>