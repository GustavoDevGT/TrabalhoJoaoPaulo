<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Meu App')</title>
    <link rel="stylesheet" href="resources/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


    <main>
        @yield('content')
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
