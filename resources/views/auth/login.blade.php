<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login - Sistem Informasi Hotel</title>
</head>

<body>

    <div class="container p-5">
        <div id="login">
            <div class="login-header d-flex justify-content-center align-items-center text-center mb-3">
                <div>
                    <h1>Login</h1>
                    <h3>Sistem Informasi Hotel</h3>
                    <h5>Enter Username dan Password</h5>
                </div>
            </div>
            <div class="login-body">
                <form action="{{ route('login_process') }}" method="post">
                    @if (session('alert'))
                        <div class="alert alert-{{ session('alert')['status'] }}" role="alert">
                            {{ session('alert')['message'] }}
                        </div>
                    @endif
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="username">Username</label>
                        </div>
                        <div class="col-lg">
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-lg">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
