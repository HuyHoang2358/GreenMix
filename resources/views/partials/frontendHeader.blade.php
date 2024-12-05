<div class="hidden md:block fixed w-full z-50 shadow-lg">
    <!-- Top header -->
    <div class="bg-primary-dark text-center py-1.5 px-16 text-white">
        <div class="w-ful flex justify-between items-center">
            <!-- Hotline -->
            <div class="flex justify-start items-center gap-2">
                <p><i class="fa-solid fa-phone fa-beat-fade mr-2"></i> Hotline:</p>
                <p class="font-semibold border-r border-white pr-2">{{ Config::get('website.top_hotline_1') }}</p>
                <p class="font-semibold">{{ Config::get('website.top_hotline_2') }}</p>
            </div>
            <!-- End Hotline -->

            <!-- Right top header -->
            <div class="flex justify-end items-center gap-12">
                <!-- Social icons -->
                <div class="flex justify-end items-center gap-4 text-2xl">
                    <a href="{{ Config::get('website.facebook_url') }}">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="{{ Config::get('website.youtube_url') }}">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="{{ Config::get('website.tiktok_url') }}">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
                <!-- End Social icons -->

                <!-- Languages -->
                <div class="flex justify-end items-center gap-2">
                    @foreach ($languages as $lang)
                        <button type="button"
                            class="flex justify-start items-center gap-1 {{ $loop->index + 1 == count($languages) ? '' : 'border-r border-white' }} pr-2">
                            <img src="{{ asset($lang->icon) }}" alt="flag-english" class="w-8 h-8">
                            <p>{{ $lang->name }}</p>
                        </button>
                    @endforeach
                </div>
                <!-- End Languages -->
            </div>
            <!-- End Right top header -->
        </div>
    </div>
    <!-- End Top header -->

    <!-- Menu -->
    <div class="bg-white px-16 py-1">

        <div class="flex justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }}">
                <img src="{{ asset(Config::get('website.logo') ?? 'images/logo/green-mix-logo-new.png') }}"
                    alt="greenMix-logo" class="max-w-48">
            </a>

            <!-- Menu Items -->
            <div class="px-14">
                <div class="uppercase flex gap-x-8 font-semibold h-full">
                    <div class="relative dropdown group">
                        <a class="group-hover:cursor-pointer group-hover:text-primary-dark h-full w-full flex justify-center items-center gap-2 "
                            href="#">Về green mix <i class="fa-solid fa-chevron-down"></i></a>
                        <div
                            class="dropdown-content absolute group-hover:flex flex-col bg-white -bottom-15 right-0 z-10 w-60 drop-shadow-md border-t-4 border-primary-dark normal-case font-normal text-left hidden">
                            <a class="p-2 border-b hover:bg-gray-300" href="{{route('post.detail', ['slug'=> 'gioi-thieu-ve-greenmix'])}}">Về chúng tôi</a>
                            <a class="p-2 border-b hover:bg-gray-300" href="{{route('post.detail', ['slug'=> 'lich-su-phat-trien'])}}">Lịch sử phát triển</a>
                            <a class="p-2 border-b hover:bg-gray-300" href="{{url('/').'#project-using'}}">Dự án tiêu biểu</a>
                            <a class="p-2 text-wrap hover:bg-gray-300" href="{{url('/').'#partners'}}">Đối tác & Khách hàng</a>
                        </div>
                    </div>
                    <div class="relative dropdown group">
                        <a class="group-hover:cursor-pointer group-hover:text-primary-dark h-full w-full flex justify-center items-center gap-2 "
                            href="{{ route('business') }}">Lĩnh vực kinh doanh<i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <div
                            class="dropdown-content absolute group-hover:flex flex-col bg-white -bottom-15 right-0 z-10 w-72 drop-shadow-md border-t-4 border-primary-dark normal-case font-normal text-left hidden">
                            @foreach ($menuFields as $menu)
                                <a class="p-2 {{ $loop->index + 1 == count($menuFields) ? '' : 'border-b' }} hover:bg-gray-300"
                                    href="{{ route('business.detail', $menu->slug) }}">{{ $menu->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="relative dropdown group">
                        <a class="group-hover:cursor-pointer group-hover:text-primary-dark h-full w-full flex justify-center items-center gap-2 "
                            href="{{ route('product') }}">Sản phẩm<i class="fa-solid fa-chevron-down"></i></a>
                        <div
                            class="dropdown-content absolute group-hover:flex flex-col bg-white -bottom-15 right-0 z-10 w-72 drop-shadow-md border-t-4 border-primary-dark normal-case font-normal text-left hidden">
                            @foreach ($menuProducts as $menu)
                                <a class="p-2 {{ $loop->index + 1 == count($menuProducts) ? '' : 'border-b' }} hover:bg-gray-300"
                                    href="{{ route('product.detail', $menu->slug) }}">{{ $menu->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="relative dropdown group">
                        <a class="group-hover:cursor-pointer group-hover:text-primary-dark h-full w-full flex justify-center items-center gap-2 "
                            href="#">Truyền thông <i class="fa-solid fa-chevron-down"></i></a>
                        <div
                            class="dropdown-content absolute group-hover:flex flex-col bg-white -bottom-15 right-0 z-10 w-72 drop-shadow-md border-t-4 border-primary-dark normal-case font-normal text-left hidden">
                            <a class="p-2 border-b hover:bg-gray-300" href="{{route('communication')}}">Truyền thông về Green Mix</a>
                            <a class="p-2 border-b hover:bg-gray-300" href="{{route('knowledge')}}">Kiến thức xây dựng</a>
                            <a class="p-2 text-wrap hover:bg-gray-300" href="#">Catalog</a>
                        </div>
                    </div>
                    <div class="flex hover:cursor-pointer hover:text-primary-dark justify-center items-center h-full">
                        <a href="{{ route('recruitment') }}">Tuyển dụng</a>
                    </div>
                    <div class="flex hover:cursor-pointer hover:text-primary-dark justify-center items-center h-full">
                        <a href="{{ route('contact') }}">Liên hệ</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Menu -->
</div>

<div class="shadow-canvas w-full h-full bg-black">

</div>

<!-- Mobile menu -->
<div class="block sm:hidden fixed z-50 w-full">

    <div class="bg-primary-dark text-center py-2 flex justify-between text-white">
        <div>
            <img src="{{ asset(Config::get('website.logo') ?? 'images/logo/green-mix-logo-new.png') }}" alt="greenMix-logo" class="w-32 bg-white py-2 px-2">
        </div>
        <button onclick="openNav()"><i class="fa-solid fa-bars text-3xl pr-4"></i></button>
    </div>
</div>
<div class="relative">

    <!-- Opacity Black Layer -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden"></div>

    <div id="mySidenav"
        class="sidenav h-full w-0 fixed z-50 top-0 right-0 bg-menu-gray overflow-x-hidden pt-10 duration-500">
        <a href="javascript:void(0)" class="closebtn absolute top-0 right-2 text-3xl" onclick="closeNav()">&times;</a>
        <nav class="flex flex-col font-semibold min-w-[250px]">
            <!--About us Accrodian button-->
            <a class="accordion uppercase border-y p-3 flex justify-between duration-500">
                <i class="fa-solid fa-chevron-down pt-1"></i> Về green mix</a>
            <!--About us Accrodian panel-->
            <div class="panel overflow-hidden hidden font-normal border-b">
                <a class="flex border-b justify-end items-center gap-1 p-2" href="{{route('post.detail', ['slug'=> 'gioi-thieu-ve-greenmix'])}}">
                    Về chúng tôi
                </a>
                <a class="flex border-b justify-end items-center gap-1 p-2" href="{{route('post.detail', ['slug'=> 'lich-su-phat-trien'])}}">
                    Lịch sử phát triển
                </a>
                <a class="flex border-b justify-end items-center gap-1 p-2" href="{{url('/').'#project-using'}}">
                    Dự án tiêu biểu
                </a>
                <a class="flex border-b justify-end items-center gap-1 p-2" href="{{url('/').'#partners'}}">
                    Đối tác & khách hàng
                </a>
            </div>
            <!--End About us Accrodian panel-->

            <!--Field Accrodian button-->
            <a class="accordion uppercase border-y p-3  flex justify-between duration-500"><i
                    class="fa-solid fa-chevron-down pt-1"></i> Lĩnh vực kinh doanh</a>
            <!--Field Accrodian panel-->
            <div class="panel overflow-hidden hidden font-normal border-b">
                @foreach ($menuFields as $menu)
                    <a class="flex border-b justify-end items-center gap-1 p-2"
                        href="{{ route('business.detail', $menu->slug) }}">{{ $menu->name }}</a>
                @endforeach
            </div>
            <!--End Field Accrodian panel-->

            <!--Media Accrodian button-->
            <a class="accordion uppercase border-y p-3  flex justify-between duration-500"><i
                    class="fa-solid fa-chevron-down pt-1"></i> Sản phẩm</a>
            <!--Media Accrodian panel-->
            <div class="panel overflow-hidden hidden font-normal border-b">
                @foreach ($menuProducts as $menu)
                    <a class="flex border-b justify-end items-center gap-1 p-2"
                        href="{{ route('product.detail', $menu->slug) }}">{{ $menu->name }}</a>
                @endforeach
            </div>
            <!--Media Field Accrodian panel-->

            <!--About us Accrodian button-->
            <a class="accordion uppercase border-y p-3 flex justify-between duration-500" href="#"><i
                    class="fa-solid fa-chevron-down pt-1"></i> Truyền thông</a>
            <!--About us Accrodian panel-->
            <div class="panel overflow-hidden hidden font-normal border-b">
                <a class="flex border-b justify-end items-center gap-1 p-2" href="{{route('communication')}}">
                   Truyền thông về Green Mix
                </a>
                <a class="flex border-b justify-end items-center gap-1 p-2" href="{{route('knowledge')}}">
                    Kiến thức xây dựng
                </a>
                <a class="flex border-b justify-end items-center gap-1 p-2" href="#">
                    Catalog
                </a>
            </div>
            <!--End About us Accrodian panel-->

            <a class="uppercase border-b p-3 flex justify-end" href="{{ route('recruitment') }}">Tuyển dụng</a>
            <a class="uppercase border-b p-3 flex justify-end" href="{{ route('contact') }}">Liên hệ</a>

            <!--Language Accrodian button-->
            <a class="accordion uppercase border-b p-3 flex justify-between duration-500" href="#"><i
                    class="fa-solid fa-chevron-down pt-1"></i>Ngôn ngữ</a>
            <!--Language Accrodian panel-->
            <div class="panel overflow-hidden hidden font-normal border-b">
                @foreach ($languages as $lang)
                    <div class="flex justify-end items-center gap-1 p-2">
                        <p>{{ $lang->name }}</p>
                        <img src="{{ asset($lang->icon) }}" alt="flag-languague" class="w-5 h-5">
                    </div>
                @endforeach
            </div>
            <!--End Language Accrodian panel-->

        </nav>
        <div class="flex justify-center min-w-[250px] gap-4 p-5 text-2xl mt-12">
            <a href="{{ Config::get('website.facebook_url') }}" class="text-blue-700 hover:text-primary">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="{{ Config::get('website.youtube_url') }}" class="text-red-600 hover:text-primary">
                <i class="fa-brands fa-youtube"></i>
            </a>
            <a href="{{ Config::get('website.tiktok_url') }}" class="text-black hover:text-primary">
                <i class="fa-brands fa-tiktok"></i>
            </a>
        </div>
        <div class="min-w-[250px]">
            <div class="text-sm text-center font-semibold">
                <span class="font-semibold text-lg"> Hotline:</span> <br>
                0972 555 666 - 0972 555 666
            </div>
            <img src="{{ asset(Config::get('website.logo') ?? 'images/logo/green-mix-logo-new.png') }}" alt="greenMix-logo" class=" w-full px-4">
        </div>
    </div>
</div>

<script>
    /* Set the width of the side navigation to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        $('#overlay').toggleClass('hidden');
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        $('#overlay').toggleClass('hidden');
    }

    $('#overlay').click(function() {
        closeNav();
    });

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("accordion-active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }

            /* Toggle the icon class */
            var icon = this.querySelector("i");
            icon.classList.toggle("fa-chevron-down");
            icon.classList.toggle("fa-chevron-up");

        });
    }

    $('.dropdown').hover(
        function() {
            $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        }
    );
</script>
