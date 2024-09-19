<!DOCTYPE html>
<html lang="en">

<head>
    @include('partial.Admin.head')
</head>

<body class="sb-nav-fixed">
    @include('partial.Admin.nav')
    <div id="layoutSidenav">
        @include('partial.Admin.left')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('partial.Admin.footer')
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/js/datatables-simple-demo.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/lvrp7paughdgfcjfcz4s32jit7dsdt754vl61whzief84sr5/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <x-head.tinymce-config />
    <script src="https://cdn.ckeditor.com/ckeditor5/ckeditor.js"></script>

</body>

</html>
