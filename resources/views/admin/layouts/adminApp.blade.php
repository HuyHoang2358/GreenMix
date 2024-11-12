<html lang="en" class="light">
    <head>
        <title>@yield('title') | GreenMix</title>
        @include('admin.partials.head')
    </head>

    <body class="py-5 md:py-0">
        <!-- Mobile Menu -->
        @include('admin.partials.mobileMenu')

        <!-- Top Bar -->
        @include('admin.partials.topBar')

        <div class="flex overflow-hidden">
            <!-- Side Menu -->
            @include('admin.partials.sideMenu')

            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>
        </div>


        <!-- JS Assets-->
        @include('admin.partials.bodyJavascript')
    </body>
</html>
