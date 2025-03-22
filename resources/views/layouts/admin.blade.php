<!DOCTYPE html>
<html lang="en">
@include('includes.header');

<body class="sb-nav-fixed">
    @include('includes.top_header');
    <div id="layoutSidenav">
        @include('includes.slidebar');
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>
            
            @include('includes.footer');