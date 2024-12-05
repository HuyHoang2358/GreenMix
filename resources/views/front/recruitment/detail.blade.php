@extends('layouts.appLayout')
@section('title', 'Tuyển dụng')
@section('seo')

@endsection
@section('head')
<style>
    .recruitment-description ul li {
        list-style-type: disc;
        padding: 0 5px;
        margin-left: 30px;
    }
</style>
@endsection
@section('content')
    <div class="bg-white px-5 sm:px-[10%] py-6 sm:py-10">
        <!-- Session 1: Title -->
        <div class="flex justify-start items-center gap-2 mb-4 md:mb-8 font-semibold text-primary">
            <a href="{{url('/')}}" class="hover:text-gray-400"> Trang chủ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="{{route('recruitment')}}" class="hover:text-gray-400"> Tuyển dụng</a>
            <i class="fa-solid fa-angle-right hidden md:block"></i>
            <a href="#" class="text-gray-400 hidden md:block">{{$recruitment->name ?? ''}}</a>
        </div>
        <!-- End Session 1: Title -->


        <!-- Session 2: Image & Short Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 mb-10 gap-4 md:gap-16">
            <div class="col-span-1 max-w-[500px] ">
                <img src="{{$recruitment->image}}" alt="{{$recruitment->slug}}" class="bg-gray-100 aspect-square w-full h-full">
            </div>

            <div class="flex flex-col gap-5">
                <h1 class="text-2xl md:text-3xl font-bold text-primary-dark capitalize">{{ $recruitment->name }}</h1>
                <div class="border-2 rounded-xl  p-2 md:px-7 md:py-5 text-lg text-[#27343b]">
                    <p class="text-xl font-semibold cap">{{config('website.company_name')}}</p>
                    <div class="flex justify-between font-medium text-lg py-3">
                        <p class="text-gray-500"> <span class="font-semibold text-primary">Ngày đăng: </span>{{$recruitment->start_date}}</p>
                        <p class="text-gray-500"> <span class="font-semibold text-primary">Hạn nộp hồ sơ:</span> {{$recruitment->end_date}}</p>
                    </div>
                    <p><span class="font-semibold text-primary">Thời gian làm việc:</span> Toàn thời gian</p>
                    <ul class="list-disc px-8">
                        <li>Địa điểm làm việc: {{$recruitment->address}}</li>
                        <li>Công ty: {{config('website.company_name')}}</li>
                    </ul>
                    <h4 class="text-lg py-3"><span class="font-semibold text-primary">Yêu cầu: </span></h4>
                    <div class="recruitment-description">{!!$recruitment->requirements!!}</div>
                    <h4 class="text-lg py-5"><span class="font-semibold text-primary">Số lượng người cần tuyển:</span> {{$recruitment->num_people}} người</h4>
                </div>
                <div class="bg-gray-200"></div>
                <a href="{{route('contact'). '#contact-form'}}" class="w-full">
                    <button type="button" class="hover:bg-light-primary text-base md:text-lg bg-primary-dark font-semibold rounded-xl text-white py-4 uppercase w-full">
                        Liên hệ để lấy thêm thông tin
                    </button>
                </a>
            </div>
        </div>
        <!-- End Session 2: Image & Short Information -->

        <!-- Session 3: Business Post Detail -->
        <div class="flex flex-col gap-5">
            <h3 class="text-xl md:text-2xl uppercase font-semibold border-b-2 border-primary pb-1">Mô tả lĩnh vực kinh doanh</h3>
            <p class="text-lg">{{ $recruitment->description }}</p>

            <h3 class="text-xl md:text-2xl uppercase font-semibold border-b-2 border-primary pb-1">Quyền lợi được hưởng</h3>
            <p>{{$recruitment->benefit}}</p>

            <h3 class="text-xl md:text-2xl uppercase font-semibold border-b-2 border-primary pb-1">Thông tin thêm</h3>
            <p>{{$recruitment->content}}</p>
        </div>
        <!-- End Session 3: Business Post Detail -->
    </div>

@endsection
