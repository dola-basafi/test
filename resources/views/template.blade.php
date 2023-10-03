<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid mx-auto">
                @auth
                <a class="navbar-brand" href="#">Task</a>
                <a class="navbar-brand bg-danger p-1 text-light float-end" href="{{ route('logout') }}">Logout</a>
                @endauth
                @guest
                <a class="navbar-brand text-center" href="#">Login</a>
                @endguest
            </div>
        </nav>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                  <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    {!! implode('', $errors->all('<p>:message</p>')) !!}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                  <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('success') }}
                </div>
            @endif


        </div>

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
