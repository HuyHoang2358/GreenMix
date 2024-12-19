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
    <div class="app text-sm md:text-base">
        <!-- Header -->
        @include('partials.frontendHeader')
        <!-- End Header -->

        <!-- Content -->
        <div class="pt-12 md:pt-24">
            @yield('content')
        </div>

        <button class="fixed bottom-28 right-8 rounded-full px-[10px] py-2 bg-primary text-white hidden text-4xl" id="closeTag_2">
            <i class="fa-brands fa-weixin"></i>
        </button>
        <div class="fixed bottom-0 left-0 z-50 w-full md:hidden">
            <div class="w-full bg-primary-dark text-center p-5 grid grid-cols-10 gap-3" id="OpenTag">
                <div class="flex items-center justify-center rounded-md col-span-4 bg-light-primary text-white gap-3 py-2">
                    <i class="fa-solid fa-phone text-2xl fa-bounce"></i>
                    <div class="text-sm text-start">
                        <p>Hotline 1</p>
                        <p>{{config('website.top_hotline_2')}}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center rounded-md col-span-4 bg-light-primary text-white gap-3 py-2">
                    <i class="fa-solid fa-phone text-2xl fa-bounce"></i>
                    <div class="text-sm text-start">
                        <p>Hotline 2</p>
                        <p>{{config('website.top_hotline_2')}}</p>
                    </div>
                </div>
                <div class="col-span-2 bg-light-primary rounded-md flex items-center justify-center">
                    <i class="fa-brands fa-facebook-messenger text-3xl text-white"></i>
                </div>
            </div>
            <button class="absolute top-[-15px] right-0 text-red-700 rounded-full px-2 py-[2px] bg-white" id="closeTag_1">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <!-- EndContent -->

        <!-- Footer -->
        @include('partials.frontendFooter')
        <!-- End Footer -->
    </div>
</body>

@include('partials.bottom_js')
<script>
    $(document).ready(function(){
        const closeButton_1 = $("#closeTag_1");
        const closeButton_2 = $("#closeTag_2");
        const closeButton_3 = $("#closeTag_3");
        const OpenTag = $("#OpenTag");

        closeButton_1.on("click", function(){
            OpenTag.fadeOut();
            $(this).hide();
            closeButton_2.show();
        });
        closeButton_2.on("click", function(){
            OpenTag.fadeIn();
            $(this).hide();
            closeButton_1.show();
        });
        closeButton_3.on("click", function(){
            OpenTag.fadeIn();
            closeButton_2.hide();
            closeButton_1.show();
        });
    });
</script>
</html>
