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

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="font-sans antialiased d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">MyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" href="{{route('author.posts.index')}}">Manage Post </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('author.tags.index')}}"> Tags </a>
                </li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">

                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">

                        <li class="dropdown-item ">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                 class="text-decoration-none text-danger ">
                                    {{ __('Log Out...') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="text-center mt-5">
    @if (session()->has('danger'))
        <div
            class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 bg-danger w-50 mx-auto rounded"
            role="alert">
            <span class="font-medium">{{ session()->get('danger') }}!</span>
        </div>
    @endif
    @if (session()->has('success'))
        <div
            class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 bg-success w-50 mx-auto rounded"
            role="alert">
            <span class="font-medium">{{ session()->get('success') }}!</span>
        </div>
    @endif
    @if (session()->has('warning'))
        <div
            class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800 bg-warning w-50 mx-auto rounded"
            role="alert">
            <span class="font-medium">{{ session()->get('warning') }}!</span>
        </div>
    @endif
</div>


<div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex-grow-1">
    <!-- Page Content -->
    <main class="font-family-sans-serif">
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

