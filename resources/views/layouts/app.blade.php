<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('stylesheet')

</head>
<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            @if(Auth::user())
                @include('leftsidebar')
            @endif
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @if(Auth::user())
                    @include('header')
                @endif
                <!-- main header @e -->

                <!-- content @s -->
                <div class="nk-content ">

                    @yield('content')

                </div>
                @include('footer')
            </div>
        </div>
    </div>
</body>

@include('javascript')

</html>
