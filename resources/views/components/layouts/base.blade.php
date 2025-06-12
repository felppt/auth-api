<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"> --}}
    <title>@yield('page.title', '')</title>
    {{-- <script src="https://cdn.tailwindcss.com/?plugins=forms"></script> --}}
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans antialiased dark:bg-black">
    {{ $slot }}

</body>

</html>
