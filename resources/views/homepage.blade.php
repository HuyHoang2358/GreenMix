@extends('layouts.appLayout')
@section('title', 'Trang chủ')
@section('seo')

@endsection
@section('content')
    <!-- Banner -->
    @include('partials.frontendBanner', ['banners' => $banners])


    <!-- Section Lĩnh vực kinh doanh -->
    <h3 class="text-3xl font-bold text-center mt-16">LĨNH VỰC KINH DOANH</h3>
    <P class="text-center px-5 md:px-[600px] py-7 md:my-16">Với hơn 30+ năm kinh nghiệm trong lĩnh vực xây dựng và sản xuất phụ gia bê tông cao cấp Green Mix Việt Nam cung cấp giải pháp bằng các danh mục sản phẩm chuyên biệt cho từng hạng mục công trình xây dựng trên toàn quốc.</P>

    <div class="grid md:grid-cols-3 gap-16 px-7 mb-7 md:mb-0 md:px-32">
        @foreach($businesses as $business)
            <a href="{{route('business.detail', $business->slug)}}">
                @php
                    $images = json_decode($business->images);
                    if (count($images) > 0) {
                        $business->images = $images[0];
                    } else {
                        $business->images = 'frontend/business_field/1.png';
                    }
                @endphp
                <div class="col-span-1 shadow-lg shadow-gray-400">
                    <img src="{{asset($business->images)}}" alt="{{$business->slug}}">
                    <p class="text-center text-white text-xl font-semibold bg-primary py-5 tracking-wider uppercase">{{$business->name}}</p>
                </div>
            </a>
        @endforeach
    </div>
    <!-- End Section Lĩnh vực kinh doanh -->

    <!-- Section Liên doanh dịch vụ -->
    <div class="grid md:grid-cols-2 px-7 md:px-80 gap-8 md:gap-32 py-16 md:py-28 bg-[#F0F0F0] md:bg-white">
        <div class="col-span-1">
            <h3 class="text-2xl font-bold">Liên doanh tập đoàn</h3>
            <p class="text-2xl md:text-3xl font-bold py-5">CANON GUANGZHOU MASTERIAL <br> và GREEN MIX VIỆT NAM</p>
            <div>
                <div class="flex items-center border-b-2 border-gray-500 pl-5 mb-5 pb-2">
                    <p class="w-28 text-primary font-bold text-3xl">30+</p>
                    <p class="text-lg">Nắm kinh nghiệm</p>
                </div>
                <div class="flex items-center border-b-2 border-gray-500 pl-5 mb-5 pb-2">
                    <p class="w-28 text-primary font-bold text-3xl">15+</p>
                    <p class="text-lg">CSSX tại Trung Quốc và Việt Nam</p>
                </div>
                <div class="flex items-center border-b-2 border-gray-500 pl-5 mb-5 pb-2">
                    <p class="w-28 text-primary font-bold text-3xl">300+</p>
                    <p class="text-lg">Cán bộ nhân viên toàn quốc</p>
                </div>
                <div class="flex items-center border-b-2 border-gray-500 pl-5 mb-5 pb-2">
                    <p class="w-28 text-primary font-bold text-3xl">40+</p>
                    <p class="text-lg">Tỉnh thành đã lưu hành sản phẩm</p>
                </div>
                <div class="flex items-center border-b-2 border-gray-500 pl-5 mb-5 pb-2">
                    <p class="w-28 text-primary font-bold text-3xl">200+</p>
                    <p class="text-lg">Khách hàng tin tưởng đồng hành</p>
                </div>
            </div>
        </div>
        <div class="col-span-1 h-full flex items-center">
            <img src="{{asset('frontend/other/1.png')}}" alt="">
        </div>
    </div>
    <!-- End liên doanh Dịch vụ -->

    <!-- Section các dự án sử dụng -->
    <div class="bg-primary px-5 md:px-48 py-7">
        <div class="md:flex justify-between text-center">
            <p class="text-white font-bold text-2xl">Các dự án đang sử dụng <br>sản phẩm của Green Mix</p>
            <div class="flex gap-3 justify-center py-5 md:hidden">
                @for($i = 1; $i <=5; $i++)
                    <p class="h-4 w-4 bg-white rounded-full"></p>
                @endfor
                @for($i = 1; $i <=3; $i++)
                    <p class="h-4 w-4 bg-primary-dark rounded-full"></p>
                @endfor
                @for($i = 1; $i <=5; $i++)
                    <p class="h-4 w-4 bg-white rounded-full"></p>
                @endfor
            </div>
            <p class="text-white font-bold text-4xl flex items-center justify-center"> 100 <span class="translate-y-[-12px] text-2xl">+</span><span class="text-lg pl-3">dự án</span></p>
        </div>
        <div class="pt-3 md:flex gap-3 hidden md:block">
            @for($i = 1; $i <=26; $i++)
                <p class="h-4 w-4 bg-white rounded-full"></p>
            @endfor
            @for($i = 1; $i <=3; $i++)
                <p class="h-4 w-4 bg-primary-dark rounded-full"></p>
            @endfor
            @for($i = 1; $i <=26; $i++)
                <p class="h-4 w-4 bg-white rounded-full"></p>
            @endfor
        </div>
    </div>

    <div class="grid md:grid-cols-4 gap-10 mt-10 px-10 md:px-40 relative">
        <a class="absolute left-12 top-[35%] md:block hidden" href="#"><i class="fa-solid fa-angles-left text-3xl bg-primary text-white rounded-full px-5 py-4 hover:text-4xl"></i></a>
        <a href="#">
            <div class="col-span-1 relative group/item">
                <img src="{{asset('frontend/du_an/1.png')}}" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-black via-0% to-transparent group-hover/item:block hidden group-hover/item:ease-in-out group-hover/item:duration-700"></div>
                <div class="absolute bottom-5 left-5 text-white">
                    <p class="text-lg font-semibold">Dự Án VinHomes Vũ Yên</p>
                    <div class="flex gap-2">
                        <i class="fa-solid fa-location-dot text-xl"></i>
                        <p class="text-sm flex items-end">Hải Phòng</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col-span-1 relative group/item">
                <img src="{{asset('frontend/du_an/2.png')}}" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-black via-0% to-transparent group-hover/item:block hidden group-hover/item:ease-in-out group-hover/item:duration-700"></div>
                <div class="absolute bottom-5 left-5 text-white">
                    <p class="text-lg font-semibold">Dự Án Hầm Núi Phượng Hoàng</p>
                    <div class="flex gap-2">
                        <i class="fa-solid fa-location-dot text-xl"></i>
                        <p class="text-sm flex items-end">Triệu Khánh, Trung Quốc</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col-span-1 relative group/item">
                <img src="{{asset('frontend/du_an/3.png')}}" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-black via-0% to-transparent group-hover/item:block hidden group-hover/item:ease-in-out group-hover/item:duration-700"></div>
                <div class="absolute bottom-5 left-5 text-white">
                    <p class="text-lg font-semibold">Dự Án Đường Vành Đai 4</p>
                    <div class="flex gap-2">
                        <i class="fa-solid fa-location-dot text-xl"></i>
                        <p class="text-sm flex items-end">Bắc Ninh</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col-span-1 relative group/item">
                <img src="{{asset('frontend/du_an/4.png')}}" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-black via-0% to-transparent group-hover/item:block hidden group-hover/item:ease-in-out group-hover/item:duration-700"></div>
                <div class="absolute bottom-5 left-5 text-white">
                    <p class="text-lg font-semibold">Dự Án Đường Sắt Cao Tốc</p>
                    <div class="flex gap-2">
                        <i class="fa-solid fa-location-dot text-xl"></i>
                        <p class="text-sm flex items-end">Tam Thủy, Trung Quốc</p>
                    </div>
                </div>
            </div>
        </a>
        <a class="absolute right-12 top-[35%] md:block hidden" href="#"><i class="fa-solid fa-angles-right text-3xl bg-primary text-white rounded-full px-5 py-4 hover:text-4xl"></i></a>
        <div class="text-center">
            <button class="px-7 py-2 text-white bg-primary rounded-xl w-fit md:hidden">Xem thêm</button>
        </div>
    </div>
    <!-- End các dự án sử dụng -->

    <!-- Section đối tác công ty -->
    <div class="px-7 md:px-32 py-10">
        <h3 class="text-center font-bold text-3xl my-8 md:my-12 ">ĐỐI TÁC CÔNG TY</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-7">
            @foreach($partners as $partner)
                <a href="#">
                    <div class="col-span-1 md:w-[230px] h-[120px]">
                        <img class="w-full h-full border-2 border-gray-300 shadow-xl transform" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.4);" src="{{asset($partner->logo)}}" alt="">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <!-- End đối tác công ty -->

    <!-- Section tin tức -->
    <!-- End tin tức -->
@endsection

