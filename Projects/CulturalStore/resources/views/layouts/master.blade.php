@include('layouts/header');

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('layouts/navigation');

    @yield('content');

    @include('layouts.footer');

</body>
    @include('layouts.scripts');
</html>