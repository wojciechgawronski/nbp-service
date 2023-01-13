<!DOCTYPE html>
<html lang="{{ env('APP_lANG') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>{{ env('APP_TITLE') }}</title>
    <link rel="stylesheet" href="{{ asset('/css/basic.css') }}">
</head>
<body class="@if (session('isDarkTheme')) dark-theme  @endif">
    @include('site_elements.nav')
    @include('site_elements.flash_messages')
    @yield('main')
    @include('site_elements.footer')
</body>
</html>
