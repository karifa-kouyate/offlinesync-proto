<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>

    <link href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   <div id="wrapper">
        @include('partials.nav')
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/morrisjs/morris.min.js') }}"></script>
    <!-- script type="text/javascript" src="{{ asset('styles/js/morris-data.js') }}"></script -->
    <script type="text/javascript" src="{{ asset('styles/js/sb-admin-2.js') }}"></script>

    @if(isset($exportScript))
    <script type="text/javascript" src="{{ $exportScript }}"></script>
    @endif
</body>
</html>
