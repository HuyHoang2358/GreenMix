@extends('layouts.appLayout')
@section('title', 'Trang chủ')
@section('seo')

@endsection
@section('content')
    <!-- Banner -->
    @include('partials.frontendBanner', ['banners' => $banners])


    <!-- Section Lĩnh vực kinh doanh -->
    <div class="my-12">
        <h3 class="text-3xl font-bold text-center">LĨNH VỰC KINH DOANH</h3>
        <P class="text-left px-5 md:px-[25%] py-7">Với hơn 30+ năm kinh nghiệm trong lĩnh vực xây dựng và sản xuất phụ gia bê tông cao cấp Green Mix Việt Nam cung cấp giải pháp bằng các danh mục sản phẩm chuyên biệt cho từng hạng mục công trình xây dựng trên toàn quốc.</P>

        <div class="grid md:grid-cols-3 gap-16 px-7 py-4 mb-7 md:mb-0 md:px-32 mt-12">
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
                    <div class="col-span-1 shadow-lg shadow-gray-400 overflow-hidden ">
                        <img src="{{asset($business->images)}}" alt="{{$business->slug}}" class="w-full hover:scale-110">
                        <p class="text-center text-white text-xl font-semibold bg-primary py-5 uppercase hover:bg-light-primary">{{$business->name}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- End Section Lĩnh vực kinh doanh -->

    <!-- Section Liên doanh dịch vụ -->
    <div class="grid md:grid-cols-2 px-7 md:px-[12%] gap-4 md:gap-32 py-16 md:py-12 bg-[#F0F0F0] md:bg-white">
        <div class="col-span-1">
            <h3 class="text-2xl font-bold">Liên doanh tập đoàn</h3>
            <p class="text-2xl md:text-3xl font-bold py-2">CANON GUANGZHOU MASTERIAL <br> và GREEN MIX VIỆT NAM</p>
            <div class="mt-4">
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
        <div class="col-span-1  w-full h-full flex items-center">
            <img src="{{asset('frontend/other/1.png')}}" alt="">
        </div>
    </div>
    <!-- End liên doanh Dịch vụ -->

    <!-- Section các dự án sử dụng -->
    <div class="bg-primary px-5 md:px-48 py-10">
        <div>
            <div class="flex justify-start flex-col relative h-36 sm:h-auto text-center sm:text-start">
                <p class="text-white font-bold text-2xl">Các dự án đang sử dụng <br>sản phẩm của Green Mix</p>
                <div>
                    <div class="dots-container2 pt-3 flex gap-3 justify-center">
                    </div>
                </div>
                <p class="text-white font-bold text-4xl flex items-center justify-center absolute left-1/2 right-1/2 sm:left-auto sm:right-0 -bottom-1 sm:top-0"> 100 <span class="translate-y-[-12px] text-2xl">+</span><span class="text-lg pl-3 whitespace-nowrap">dự án</span></p>
            </div>
        </div>
    </div>

    <div class="mt-10 px-10 md:px-40 relative slideshow-container">
        @foreach($projects as $chunks)
            <div class="grid mySlides2 fade md:grid-cols-4 gap-10">
                @foreach($chunks as $project)
                    <a href="#" class="w-fit h-fit">
                        <div class="col-span-1 relative group/item">
                            <img src="{{asset($project["image"])}}" class="aspect-square w-96 h-80" alt="">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-black via-0% to-transparent group-hover/item:block hidden group-hover/item:ease-in-out group-hover/item:duration-700"></div>
                            <div class="absolute bottom-5 left-5 text-white">
                                <p class="text-lg font-semibold">{{ $project["name"] }}</p>
                                <div class="flex gap-2">
                                    <i class="fa-solid fa-location-dot text-xl"></i>
                                    <p class="text-sm flex items-end">{{ $project["address"] }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach

        <a class="hover:cursor-pointer prev absolute left-12 top-[35%] md:block hidden" slide-id="1"><i class="fa-solid fa-angles-left text-3xl bg-primary text-white rounded-full px-5 py-4 hover:text-4xl"></i></a>
        <a class="hover:cursor-pointer next absolute right-12 top-[35%] md:block hidden" slide-id="1"><i class="fa-solid fa-angles-right text-3xl bg-primary text-white rounded-full px-5 py-4 hover:text-4xl"></i></a>

        <div class="text-center mt-5">
            <button class="px-7 py-2 text-white bg-primary rounded-xl w-fit md:hidden">Xem thêm</button>
        </div>
    </div>
    <!-- End các dự án sử dụng -->

    <!-- Section đối tác công ty -->
    <div class="px-7 md:px-32 py-10 my-20">
        <h3 class="text-center font-bold text-3xl my-8 md:my-12 ">ĐỐI TÁC CÔNG TY</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-7">
            @foreach($partners as $partner)
                <a href="{{$partner->url ?? '#'}}">
                    <div class="col-span-1 md:w-[230px] h-[120px]">
                        <img class="w-full h-full shadow-lg hover:opacity-50 border border-gray-400" src="{{asset($partner->logo)}}" alt="">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <!-- End đối tác công ty -->

    <!-- Section tin tức -->
    <!-- End tin tức -->

@endsection

