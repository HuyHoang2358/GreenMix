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
    <div class="bg-white px-5 sm:px-72 py-10 sm:py-10">

        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Thông tin tuyển dụng'])
        <!-- End Session 1: Title -->


        <!-- Session 2: Image & Short Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 mb-10 gap-16 px-4">
            <div class="col-span-1 ">
                <img src="{{$recruitment->image}}" alt="{{$recruitment->slug}}" class="bg-gray-100 aspect-square w-full h-full">
            </div>

            <div class="flex flex-col gap-5 px-12">
                <h2 class="text-3xl font-semibold text-primary-dark capitalize">{{ $recruitment->name }}</h2>
                <div class="border-2 rounded-xl px-7 py-5 text-lg text-[#27343b]">
                    <p class="text-xl font-semibold">{{config('website.company_name')}}</p>
                    <div class="flex justify-between font-medium text-lg py-3">
                        <p class="text-gray-500">Ngày đăng: {{$recruitment->start_date}}</p>
                        <p class="text-primary-dark">Hạn nộp hồ sơ: {{$recruitment->end_date}}</p>
                    </div>
                    <p>Thời gian làm việc: Toàn thời gian</p>
                    <ul class="list-disc px-8">
                        <li>Công ty: {{config('website.company_name')}}</li>
                        <li>Địa điểm làm việc: {{$recruitment->address}}</li>
                    </ul>
                    <h4 class="text-lg font-semibold py-3">Yêu cầu:</h4>
                    <div class="recruitment-description">{!!$recruitment->requirements!!}</div>
                    <h4 class="text-lg font-semibold py-5">Số lượng người cần: {{$recruitment->num_people}}</h4>
                </div>
                <div class="bg-gray-200"></div>
                <a href="{{route('contact'). '#contact-form'}}" class="w-full">
                    <button type="button" class="text-xl bg-primary-dark font-semibold rounded-xl text-white py-7 uppercase w-full">
                        Liên hệ tư vấn về lĩnh vực này
                    </button>
                </a>
            </div>
        </div>
        <!-- End Session 2: Image & Short Information -->

        <!-- Session 3: Business Post Detail -->
        <div class="flex flex-col gap-5">
            <p class="text-2xl uppercase font-semibold border-b-2 border-primary pb-1">Mô tả lĩnh vực kinh doanh</p>
            <p class="text-lg">{{ $recruitment->description }}</p>

            <p class="text-2xl uppercase font-semibold border-b-2 border-primary pb-1">Quyền lợi được hưởng</p>
            <p>{{$recruitment->benefit}}</p>

            <p class="text-2xl uppercase font-semibold border-b-2 border-primary pb-1">Thông tin thêm</p>
            <p>{{$recruitment->content}}</p>
        </div>
        <!-- End Session 3: Business Post Detail -->
    </div>

@endsection
