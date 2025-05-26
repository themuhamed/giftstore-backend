<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }

        .sidebar a:hover, .sidebar .nav-link.active {
            background-color: #495057;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .submenu {
            background-color: #3d434a;
            padding-left: 30px;
        }

        .arrow {
            transition: transform 0.3s;
        }

        .rotate {
            transform: rotate(90deg);
        }
    </style>
</head>
<body>
<!--
    Developed by: Muhamed — github.com/themuhamed
    University College of Applied Sciences (UCAS)
    Software Development - Web Design & Development Course
    Educational project for academic purposes only. Free and open for learning use.
    © 2025 Muhamed. All rights reserved.
-->
<div class="container-fluid">
    <div class="row">
        <div class="d-md-none">
            @include('partials.sidebar')
        </div>

        <div class="col-md-2 d-none d-md-block p-0">
            @include('partials.sidebar-static')
        </div>

        <div class="col-md-10 offset-md-2">
            @include('partials.header')

            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>

@include('partials.footer')

<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>

<script>
    const toggle = document.getElementById('productsToggle');
    const arrow = document.getElementById('productsArrow');
    const collapse = document.getElementById('productsMenu');

    if (collapse && arrow) {
        collapse.addEventListener('show.bs.collapse', () => arrow.classList.add('rotate'));
        collapse.addEventListener('hide.bs.collapse', () => arrow.classList.remove('rotate'));
    }
</script>
</body>
</html>
