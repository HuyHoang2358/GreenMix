@extends('layouts.appLayout')
@section('title', 'Tuyển dụng')
@section('seo')

@endsection

@section('content')
    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">

        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Thông tin tuyển dụng'])
        <!-- End Session 1: Title -->


        <!-- Session 2: Image & Short Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 mb-10 gap-16 px-4 ">
            <div class="col-span-1 ">
                <img src="#" alt="{{$recruitment->slug}}" class="bg-gray-100 aspect-square w-full h-full">
            </div>

            <div class="flex flex-col gap-5">
                <h2 class="text-3xl font-semibold text-primary-dark capitalize">{{ $recruitment->name }}</h2>
                <div class="border-2 rounded-xl px-5 py-7 text-lg">
                    {!! $recruitment->content !!}
                </div>
                <div class="devider h-0.5 bg-gray-200"></div>
                <a href="{{route('contact')}}" class="w-full">
                    <button type="button" class="text-xl bg-primary-dark font-semibold rounded-xl text-white py-7 uppercase w-full">
                        Liên hệ tư vấn về lĩnh vực này
                    </button>
                    </a>
            </div>
        </div>
        <!-- End Session 2: Image & Short Information -->


        <!-- Session 3: Business Post Detail -->
        <div class="flex flex-col gap-5">
            <p class="text-2xl uppercase font-semibold">Mô tả lĩnh vực kinh doanh</p>
            <div class="devider h-0.5 bg-gray-200"></div>
            <p class="text-lg">
                {{ $recruitment->description }}
            </p>
            <div class="flex justify-center flex-col gap-5 sm:px-60">
            </div>
        </div>
        <!-- End Session 3: Business Post Detail -->
    </div>

@endsection
