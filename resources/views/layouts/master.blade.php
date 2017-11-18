<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
@include('layouts.header')

@if($flash=session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">
        {{$flash}}
    </div>
@endif

@if($flash=session('error'))
    <div id="flash-message" class="alert alert-danger" role="alert">
        {{$flash}}
    </div>
@endif
<div class="container">
    <div class="row">
     @yield('content')
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>