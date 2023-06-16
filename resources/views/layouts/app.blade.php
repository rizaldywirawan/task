<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title') | {{ env('APP_NAME')  }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/590a391ff9.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')

    @stack('styles')
</head>
<body class="bg-slate-100">

<main class="container max-w-xl mx-auto bg-white h-screen p-4 lg:px-8 lg:pb-24 relative">

    @yield('content')

</main>


@vite('resources/js/app.js')

@stack('scripts')
</body>
</html>
