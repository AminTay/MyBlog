<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="font-sans antialiased d-flex flex-column min-vh-100">

<nav class="navbar bg-body-tertiary container w-100">

    <div class="container-fluid ">
        <a href="/" class="navbar-brand">MyBlog</a>
        <div class="d-flex justify-content-between w-50">

            <div class="align-items-center my-auto text-center d-flex">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth

                            <div class="d-flex">

                                <div class="mx-1">
                                    @if(auth()->user()->rule == 'superAdmin')
                                        <div class="btn btn-success btn-sm">
                                            <a href="{{route('admin.index') }}"
                                               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none text-black">Admin
                                                Panel</a>
                                        </div>
                                    @endif
                                    @if(auth()->user()->rule == 'author')
                                        <div class="btn btn-success btn-sm">
                                            <a href="{{route('author.index') }}"
                                               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none text-black">Author
                                                Panel</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="mr-1">
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <div class="btn btn-danger btn-sm">
                                            <a class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none text-black"
                                               href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        @else
                            <div class="">
                                <div class="btn btn-primary">
                                    <a href="{{ route('login') }}"
                                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none text-black">Log
                                        in</a>
                                </div>
                                <div class="btn btn-success">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none text-black">Register</a>
                                    @endif
                                </div>
                            </div>
                        @endauth
                    </div>
                @endif
            </div>
            <form method="post" action="{{route('search')}}"
                  class="d-flex">
                @csrf
                <input
                    name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>

</nav>

<div class="min-h-screen">

    <!-- Page Content -->
    <main class="font-family-sans-serif flex-grow-1">
        {{ $slot }}

    </main>
</div>

<div class="container footer mt-auto pt-5">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">&copy; 2023 MyBlog, Inc</p>
    </footer>
</div>

</body>
</html>

