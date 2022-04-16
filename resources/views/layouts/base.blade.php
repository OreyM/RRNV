<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title-prefix')</title>

    <link rel="stylesheet" href="{{ asset('assets/cute-alert/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="sidebar-mini sidebar-mini-xs sidebar-collapse text-sm layout-fixed "> {{-- sidebar-collapse --}}

<div id="app" class="wrapper">
    @include('components.navigations.header')

    @include('components.navigations.sidebar')

    <div class="content-wrapper">
        @include('components.content-header')

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    @include('components.footer')

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>

<script>window.CSRF = { csrfToken: '{{ csrf_token() }}' }</script>
<script src="{{ asset('/assets/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/cute-alert/cute-alert.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ mix('js/app-vue.js') }}"></script>

@include('elements.toasts.cute-alert')
@include('elements.toasts.cute-toast')

</body>
</html>
