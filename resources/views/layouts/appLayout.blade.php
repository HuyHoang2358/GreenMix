<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{Config::get('website.web_name')}} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset(Config::get('website.favicon'))}}"  type="image/x-icon"/>

    <!--Font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Styles -->
    @yield('head')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- SEO -->
    @include('partials.frontendSeo')


    @include('partials.top_style')

    <style>
        body {
          /* Tăng chiều cao để nội dung có thể cuộn */
            margin: 0;
            overflow-y: hidden; /* Ẩn thanh cuộn dọc */
        }

        /* Sử dụng pseudo-element để tạo khả năng cuộn */
        html {
            overflow-y: scroll; /* Giữ cho nội dung có thể cuộn */
            scrollbar-width: none; /* Ẩn scrollbar trên Firefox */
        }

        ::-webkit-scrollbar {
            display: none; /* Ẩn scrollbar trên Chrome, Edge, và Safari */
        }
    </style>

</head>
<body>
    <div class="app text-base">
        <!-- Header -->
        @include('partials.frontendHeader')
        <!-- End Header -->

        <!-- Content -->
        <div class="pt-24">
            @yield('content')
        </div>

        <!-- EndContent -->

        <!-- Footer -->
        @include('partials.frontendFooter')
        <!-- End Footer -->
    </div>
</body>

@include('partials.bottom_js')

</html>
