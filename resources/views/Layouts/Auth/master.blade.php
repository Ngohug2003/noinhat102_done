<!DOCTYPE html>
<html lang="en">
<head>
    @include('Partial.Auth.head')
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        @yield('content')
        <div id="layoutAuthentication_footer">
           @include('Partial.Auth.footer')
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>
</html>