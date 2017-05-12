<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Title goes here</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/abyskit/css/font-awesome.min.css">
    <link rel="stylesheet" href="/abyskit/css/normalize.min.css">
    <link rel="stylesheet" href="/abyskit/css/fonts.min.css">
    <link rel="stylesheet" href="/abyskit/css/admin.css">
</head>
<body>


@if(View::hasSection('content'))
    <div class="wrapper">
        @include('abyskit::includes.header')
        <div class="grid-main">
            <div class="grid-main__item">
                @include('abyskit::includes.sidebar')
            </div>
            <div class="grid-main__item">
                @yield('content')
            </div>
        </div>
    </div>
@else
    <div class="wrapper-flex wrapper-flex--column">
        @yield('page')
    </div>
@endif


<script src="/abyskit/js/jquery-3.2.1.min.js"></script>
<script src="/abyskit/ckeditor/ckeditor.js"></script>
<script src="/abyskit/ckeditor/adapters/jquery.js"></script>
<script src="/abyskit/js/admin.js"></script>
@yield('scripts')
</body>
</html>