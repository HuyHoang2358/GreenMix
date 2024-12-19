@extends('layouts.appLayout')
@section('title', 'Liên hệ')
@section('seo')

@endsection
@section('content')
    <div class="bg-white px-5 sm:px-[10%] py-6 md:py-10">
        @include('front.common.pageTitle', ['pageTitle' => 'Liên hệ'])
        <div class="grid md:grid-cols-3 gap-4 md:gap-12">
            @foreach($addresses as $address)
            <div class="col-span-1 w-full">
                <h3 class="text-xl font-semibold pb-2 text-[#3B3B3B] border-b-[3px] border-primary-dark">{{$address -> name}}</h3>
                <div class="text-md text-[#404040] flex flex-col gap-4 py-4">
                    <div class="flex gap-2 items-center h-12">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>{{$address -> detail}}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fa-solid fa-phone"></i>
                        <p>{{config('website.top_hotline_1')}}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fa-solid fa-envelope"></i>
                        <p>{{config('website.email')}}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fa-regular fa-clock"></i>
                        <p>Thứ 2 - Thứ 7: 07:30 - 17:30</p>
                    </div>
                </div>
                <div class="py-3">
                    <iframe class="w-full h-60" src="{{$address -> iframe}}"></iframe>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="grid md:grid-cols-5 bg-[#F8F8F8] md:px-72 md:pt-32 md:pb-12 md:mt-16" id="contact-form">
        <div class="col-span-1 md:col-span-3">
            <h3 class="text-2xl md:text-3xl font-bold text-[#353535]">Chúng tôi luôn sẵn sàng đồng hành cùng bạn trên mọi công trình lớn nhỏ trên toàn quốc.</h3>
            <div class="grid grid-cols-5 py-4 md:py-20">
                <div class="col-span-2">
                    <p class="font-bold text-xl pb-5">Follow Us</p>
                    <div class="flex">
                        <img class="w-16 h-10" src="{{asset('images/logo/facebook.png')}}" alt="">
                        <img class="w-16 h-10" src="{{asset('images/logo/youtube.png')}}" alt="">
                        <img class="w-16 h-10" src="{{asset('images/logo/tiktok.png')}}" alt="">
                    </div>
                </div>
                <div class="col-span-3 text-[#404040]">
                    <p class="font-bold text-xl text-black pb-2 md:pb-5">Email</p>
                    <p>Mọi yêu cầu xin vui lòng liên hệ về</p>
                    <div class="flex gap-2 items-center">
                        <i class="fa-solid fa-envelope"></i>
                        <p>{{config('website.email')}}</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center py-12 ">
                <img class="w-80" src="{{config('website.logo')}}" alt="greenMix-logo">
            </div>
        </div>
        <div class="col-span-1 md:col-span-2">
            @include('front.common.contactUs')
        </div>
    </div>
@endsection
