<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/js/login.js'])
</head>

<body>
    <section id="login-section">
        <div class="container-form-login">
            <h3 class="text-center mb-5">Log In</h3>
            @if ($message = Session::get('failed'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class='bx bx-sm bxs-x-circle bx-flashing me-2'></i>
                    <div>
                        {{ $message }}
                    </div>
                </div>
            @endif
            <form action="{{ route('authenticate') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label user-select-none">Username</label>
                    <input class="form-control p-3" type="text" placeholder="Username" id="username" name="username"
                        autocomplete="off" spellcheck="false" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label user-select-none">Password</label>
                    <input class="form-control p-3" type="password" placeholder="Password" id="password"
                        name="password" autocomplete="off" spellcheck="false" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn w-100 py-3 btn-login mb-auto shadow">Login</button>
                </div>
                <div class="mb-3 text-center">
                    <a href="#" class="text-decoration-none w-100 py-3">Forgot my password ?</a>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
