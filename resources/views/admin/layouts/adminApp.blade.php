<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | GreenMix</title>
        @include('admin.partials.head')
        @include('admin.partials.tiny_MCE_ini')
        <style>
            .form-control:invalid + .tox {
                border: 1px solid #dc3545; /* Red border color for TinyMCE editor */
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    </head>

    <body class="py-5 md:py-0 o">
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

        <!-- Action Alerts -->
        @include('admin.partials.action_alerts')
        <!-- End Action Alerts -->

        <!-- Confirm Form delete -->
        @include('admin.partials.confirmDelete')

        <!-- JS Assets-->
        @include('admin.partials.bodyJavascript')
    </body>
</html>
