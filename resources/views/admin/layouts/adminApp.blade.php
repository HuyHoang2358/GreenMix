<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | GreenMix</title>
        @include('admin.partials.head')
        @include('admin.partials.tiny_MCE_ini')
        
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
                <div class="p-2">
                    @yield('content')
                </div>
            </div>
        </div>


        <!-- JS Assets-->
        @include('admin.partials.bodyJavascript')
    </body>
</html>
