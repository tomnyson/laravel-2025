@include('includes.guest.header')

<body>
    <!-- Start Main Top -->
    @include('includes.guest.top_menu')
    <!-- End Main Top -->
    @include('includes.guest.top_header')
    @yield('content')
    @include('includes.guest.footer')

</body>

</html>