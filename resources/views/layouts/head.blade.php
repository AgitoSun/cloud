<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/assets/img/favicon/favicon.png') }}">
    <title>@yield('title') | ДИАС - Файловый менеджер</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ Vite::asset('resources/assets/css/theme.css') }}">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                alert("jQuery is working perfectly.");
            });
        });
    </script>
</head>
