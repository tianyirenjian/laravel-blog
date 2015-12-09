<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('title')
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    @yield('style')
</head>
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
    @include('goenitz.header')
    @include('goenitz.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.1
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
</div>
<script src="{{ elixir('js/app.js') }}"></script>
@yield('script')
</body>
</html>