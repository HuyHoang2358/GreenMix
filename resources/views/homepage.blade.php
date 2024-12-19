@extends('layouts.appLayout')
@section('title', 'Trang chủ')
@section('seo')

@endsection
@section('content')
    <!-- Banner -->
    @include('partials.frontendBanner', ['banners' => $banners])


    <!-- Section Lĩnh vực kinh doanh -->
    <div class="my-12">
        <h3 class="text-2xl md:text-3xl font-bold text-center">LĨNH VỰC KINH DOANH</h3>
        <p class="text-base text-left px-5 md:px-[25%] py-7">Với hơn 30+ năm kinh nghiệm trong lĩnh vực xây dựng và sản xuất phụ gia bê tông cao cấp Green Mix Việt Nam cung cấp giải pháp bằng các danh mục sản phẩm chuyên biệt cho từng hạng mục công trình xây dựng trên toàn quốc.</p>
        <div class="grid md:grid-cols-3 gap-8 md:gap-16 px-7 py-4 mb-7 md:mb-0 md:px-32 md:mt-12">
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
                        <h4 class="text-center text-white text-lg md:text-xl font-semibold bg-primary py-5 uppercase hover:bg-light-primary">{{$business->name}}</h4>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- End Section Lĩnh vực kinh doanh -->

    <!-- Section Liên doanh dịch vụ -->
    <div class="grid md:grid-cols-2 px-7 md:px-[12%] gap-4 md:gap-32 py-16 md:py-12 bg-[#F0F0F0] md:bg-white">
        <div class="col-span-1">
            <h3 class="text-xl md:text-2xl font-bold">Liên doanh tập đoàn</h3>
            <p class="text-xl md:text-3xl font-bold py-2">CANON GUANGZHOU MASTERIAL <br> và GREEN MIX VIỆT NAM</p>
            @php
                $arr = [
                    ["key" => '30', "value" => 'Năm kinh nghiệm'],
                    ["key" => '15', "value" => 'CSSX tại Trung Quốc và Việt Nam'],
                    ["key" => '300', "value" => 'Cán bộ nhân viên toàn quốc'],
                    ["key" => '40', "value" => 'Tỉnh thành đã lưu hành sản phẩm'],
                    ["key" => '200', "value" => 'Khách hàng tin tưởng đồng hành'],
                ]
            @endphp
            <div class="mt-4">
                @foreach($arr as $index => $item)
                    <div class="flex justify-start items-center border-b-2 border-gray-500 pl-5 mb-5 pb-2">
                        <p class="w-24 text-primary font-bold text-3xl" id="{{$index + 1}}" data-target="{{$item["key"]}}">{{$item["key"]}}+</p>
                        <p class="text-base md:text-lg">{{$item["value"]}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-span-1  w-full h-full flex items-center">
            <img src="{{asset('frontend/other/1.png')}}" alt="">
        </div>
    </div>
    <!-- End liên doanh Dịch vụ -->

    <!-- Section các dự án sử dụng -->
    <div class="bg-primary px-5 md:px-48 py-10" id="project-using">
        <div>
            <div class="flex justify-start flex-col relative h-36 sm:h-auto text-center sm:text-start">
                <h3 class="text-white font-bold text-2xl">Các dự án đang sử dụng <br>sản phẩm của Green Mix</h3>
                <div><div class="dots-container2 pt-3 flex gap-3 justify-center"></div></div>
                <p class="text-white font-bold text-4xl flex items-center justify-center absolute left-1/2 right-1/2 sm:left-auto sm:right-0 -bottom-1 sm:top-0"> 100 <span class="translate-y-[-12px] text-2xl">+</span><span class="text-lg pl-3 whitespace-nowrap">dự án</span></p>
            </div>
        </div>
    </div>

    <div class="mt-10 px-4 md:px-40 relative slideshow-container">
        @foreach($projects as $chunks)
            <div class="grid mySlides2 fade md:grid-cols-4 gap-4 md:gap-10">
                @foreach($chunks as $project)
                    <a href="#" class="w-fit h-fit">
                        <div class="col-span-1 relative group/item">
                            <img src="{{asset($project["image"])}}" class="aspect-square w-96 h-80" alt="">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-black via-0% to-transparent group-hover/item:block hidden group-hover/item:ease-in-out group-hover/item:duration-700"></div>
                            <div class="absolute bottom-5 left-5 text-white">
                                <p class="text-lg font-bold">{{ $project["name"] }}</p>
                                <div class="flex gap-2">
                                    <i class="fa-solid fa-location-dot text-xl"></i>
                                    <p class="text-sm flex items-end font-semibold">{{ $project["address"] }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach

        <a class="hover:cursor-pointer prev absolute left-12 top-[35%] md:block hidden" slide-id="1"><i class="fa-solid fa-angles-left text-3xl bg-primary text-white rounded-full px-5 py-4 hover:text-4xl"></i></a>
        <a class="hover:cursor-pointer next absolute right-12 top-[35%] md:block hidden" slide-id="1"><i class="fa-solid fa-angles-right text-3xl bg-primary text-white rounded-full px-5 py-4 hover:text-4xl"></i></a>

       {{-- <div class="text-center mt-5">
            <button class="px-7 py-2 text-white bg-primary rounded-xl w-fit md:hidden">Xem thêm</button>
        </div>--}}
    </div>
    <!-- End các dự án sử dụng -->

    <!-- Section đối tác công ty -->
    <div class="px-4 md:px-32 py-10 my-4 md:my-20" id="partners">
        <h3 class="text-center font-bold text-2xl md:text-3xl my-8 md:my-12 ">ĐỐI TÁC CÔNG TY</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-2 md:gap-7">
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
    <div class="grid md:grid-cols-2 px-4 md:px-[15%] my-4 md:my-16 gap-4 md:gap-8 bg-[#F9F9F9]" id="news">
        <div class="col-span-1">
            <h3 class="text-left font-bold text-2xl md:text-3xl my-4 md:my-12 uppercase">Truyền Thông</h3>
            @php
                $firstCommunicationPost = count($communicationPosts ?? []) > 0 ? $communicationPosts[0] : null;
            @endphp
            @if($firstCommunicationPost)
                <a href="{{route('communication.detail', $firstCommunicationPost->slug)}}">
                    <div class="w-full md:w-[300px] md:h-[200px]">
                        <img src="{{asset($firstCommunicationPost->images)}}" alt="{{$firstCommunicationPost->slug}}" class="size-cover w-full md:w-[300px] md:h-[200px]">
                    </div>
                    <div class="mt-3 mb-6">
                        <h5 class="font-semibold text-primary-dark">{{$firstCommunicationPost->name}}</h5>
                        <p class="font-light">{{$firstCommunicationPost->description}}</p>
                    </div>
                </a>
            @endif
            @foreach($communicationPosts as $post)
                <div class="my-4">
                    <a href="{{route('communication.detail', $post->slug)}}" class="w-full">
                        <div class="grid grid-cols-5 w-full gap-4">
                            <div class="col-span-2">
                                <img src="{{asset($post->images)}}" alt="{{$post->slug}}" class="size-cover">
                            </div>
                            <div class="col-span-3">
                                <h5 class="font-semibold text-primary-dark">{{$post->name}}</h5>
                                <p class="font-light">{{$post->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="col-span-1">
            <h3 class="text-left font-bold text-2xl md:text-3xl my-8 md:my-12 uppercase">KIẾN THỨC XÂY DỰNG</h3>
            @php
                $firstKnowledgePost = count($knowledgePosts ?? []) > 0 ? $knowledgePosts[0] : null;
            @endphp
            @if($firstKnowledgePost)
                <a href="{{route('communication.detail', $firstKnowledgePost->slug)}}">
                    <div class="w-full md:w-[300px] md:h-[200px]">
                        <img src="{{asset($firstKnowledgePost->post->images)}}" alt="{{$firstKnowledgePost->slug}}" class="size-cover md:w-[300px] md:h-[200px]">
                    </div>
                    <div class="mt-3 mb-4">
                        <h5 class="font-semibold text-primary-dark">{{$firstKnowledgePost->name}}</h5>
                        <p class="font-light">{{$firstKnowledgePost->post->description}}</p>
                    </div>
                </a>
            @endif
            @foreach($knowledgePosts as $item)
                @if($loop->index == 0)
                    @continue
                @endif
                <div class="my-4">
                    <a href="{{route('knowledge.detail', $item->slug)}}" class="w-full">
                        <div class="grid grid-cols-5 w-full gap-4 ">
                            <div class="col-span-2">
                                <img src="{{asset($item->post->images)}}" alt="{{$item->slug}}" class="size-cover ">
                            </div>
                            <div class="col-span-3">
                                <h5 class="font-semibold text-primary-dark">{{$item->name}}</h5>
                                <p class="font-light">{{$item->post->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End tin tức -->

    <script>
        // Cấu hình chung
        const duration = 2000; // Tổng thời gian hoạt hình (ms)
        const frameRate = 60; // Số khung hình mỗi giây
        const totalFrames = (duration / 1000) * frameRate;

        // Hàm kiểm tra xem phần tử có trong khung nhìn hay không
        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.bottom >= 0 &&
                rect.top <= (window.innerHeight || document.documentElement.clientHeight)
            );
        }

        // Hàm chạy animation cho từng số
        function animateNumber(element) {
            const targetNumber = parseInt(element.getAttribute("data-target")); // Lấy số mục tiêu từ data-target
            const increment = targetNumber / totalFrames;
            let currentNumber = 0;
            let frame = 0;

            function updateNumber() {
                if (frame < totalFrames) {
                    currentNumber += increment;
                    element.textContent = Math.floor(currentNumber);
                    frame++;
                    requestAnimationFrame(updateNumber);
                } else {
                    element.textContent = `${targetNumber}+`; // Thêm dấu "+" khi hoàn tất
                }
            }

            updateNumber();
        }

        // Lắng nghe sự kiện cuộn
        const animatedElements = document.querySelectorAll("[data-target]");
        const hasAnimated = new Set(); // Theo dõi phần tử đã chạy animation

        window.addEventListener("scroll", () => {
            animatedElements.forEach((element) => {
                if (!hasAnimated.has(element) && isInViewport(element)) {
                    animateNumber(element);
                    hasAnimated.add(element); // Đánh dấu đã chạy
                }
            });
        });
    </script>
@endsection

