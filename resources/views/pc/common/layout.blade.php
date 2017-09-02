<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset={{env('WEB_CHARSET_CODE')}}" />
    <title>{{env('WEB_TITLE')}}</title>
    <meta name="description" content="{{env('WEB_DESCRIPTION')}}" />
    <meta name="keywords" content="{{env('WEB_KEYWORDS')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('css')
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all">
        <link href="{{ asset('bjesa/style/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
        <link href="{{ asset('bjesa/style/style.css') }}" rel="stylesheet" type="text/css" media="all">
        <link href="{{ asset('bjesa/style/flexslider.css') }}" rel="stylesheet" type="text/css" media="all">
    @show
    @section('javascript')
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="{{ asset('bjesa/js/jquery.min.js')}}"></script>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <script type="text/javascript" src="{{asset('bjesa/js/jquery.easydropdown.js')}}"></script>
        <script type="text/javascript" src="{{asset('bjesa/js/responsiveslides.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('bjesa/js/easing.js')}}"></script>
        <script type="text/javascript" src="{{asset('bjesa/js/dedeajax2.js')}}"></script>
        {!! Toastr::render() !!}
        @yield('jsScript')
    @show
</head>
<body>
@include('pc.common.header')

@yield('content')

@include('pc.common.footer')
</body>
</html>
