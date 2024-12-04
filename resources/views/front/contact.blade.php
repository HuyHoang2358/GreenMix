@extends('layouts.appLayout')
@section('title', 'Liên hệ')
@section('seo')

@endsection
@section('content')
    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">
        @include('front.common.pageTitle', ['pageTitle' => 'Liên hệ'])
        <div class="grid grid-cols-3 gap-12">
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

    <div class="grid grid-cols-5 bg-[#F8F8F8] px-72 pt-32 pb-12 mt-16" id="contact-form">
        <div class="col-span-3 pr-16">
            <h3 class="text-3xl font-bold text-[#353535]">Chúng tôi luôn sẵn sàng đồng hành cùng bạn trên mọi công trình lớn nhỏ trên toàn quốc.</h3>
            <div class="grid grid-cols-2 py-20">
                <div class="col-span-1">
                    <p class="font-bold text-xl pb-5">Follow Us</p>
                    <div>

                    </div>
                </div>
                <div class="col-span-1 text-[#404040]">
                    <p class="font-bold text-xl text-black pb-5">Email</p>
                    <p>Mọi yêu cầu xin vui lòng liên hệ về</p>
                    <div class="flex gap-2 items-center">
                        <i class="fa-solid fa-envelope"></i>
                        <p>{{config('website.email')}}</p>
                    </div>
                </div>
            </div>
            <img class="w-80" src="{{config('website.logo')}}" alt="">
        </div>
        <div class="col-span-2 bg-primary px-10 py-16">
            <form action="{{route('dataUser')}}" method="POST">
            @csrf
                <h3 class="text-white font-semibold text-2xl">LIÊN HỆ VỚI CHÚNG TÔI</h3>
                <div class="py-8 flex flex-col gap-5">
                    <input type="text" class="rounded-lg outline-none border border-white pl-4" placeholder="Tên công ty" name="company">
                    <input type="text" class="rounded-lg outline-none border border-white pl-4" placeholder="Họ và tên" name="name">
                    <input type="text" class="rounded-lg outline-none border border-white pl-4" placeholder="Số điện thoại" name="phone">
                    <textarea rows="5" class="rounded-lg outline-none border border-white pl-4" placeholder="Nội dung" name="content"></textarea>
                </div>
                <button type="submit" class="text-white font-semibold text-xl w-full text-center py-3 border-2 border-white rounded-xl">GỬI YÊU CẦU</button>
            </form>
        </div>
    </div>
@endsection
