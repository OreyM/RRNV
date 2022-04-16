<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} | @yield('title-prefix')</title>

    <link rel="stylesheet" href="{{ mix('/assets/icheck-bootstrap/icheck-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="hold-transition login-page">

@yield('auth-content')

</body>
</html>
