<!DOCTYPE html>
<html lang="en">
<head>
    @include('partial.Client.head')
</head>
<body>
    @include('partial.Client.header') <!-- Truyền biến $categories vào header -->
    <div class="main">
        @yield('content') <!-- Phần nội dung tùy biến sẽ được render ở đây -->
    </div>
    @include('partial.Client.footer')
</body>
</html>
