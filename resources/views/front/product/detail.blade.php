@extends('layouts.appLayout')
@section('title', $product->name ?? 'Dòng sản phẩm greenMix')
@section('seo')

@endsection
@section('head')
<style>
    .product-description ul li{
        list-style-type: disc;
        padding: 5px 0;
    }
</style>
@endsection
@php
    $images = json_decode($product->images ?? '', true);
@endphp
@section('content')

    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">
        <!-- Session 1: Title -->
        <div class="flex justify-start items-center gap-2 mb-8 font-semibold text-primary">
            <a href="{{url('/')}}" class="hover:text-gray-400"> Trang chủ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="{{route('product')}}" class="hover:text-gray-400"> Dòng sản phẩm</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="#" class="text-gray-400">{{$product->name ?? ''}}</a>
        </div>
        <!-- End Session 1: Title -->


        <!-- Session 2: Image & Short Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 mb-10 gap-16 px-4">
            <div class="col-span-1 ">
                <img src="{{ asset(reset($images)) }}" alt="{{$product->slug}}" class="aspect-square w-full h-full">
            </div>
            <div class="flex flex-col gap-5">
                <h1 class="text-3xl font-bold text-primary-dark capitalize">{{ $product->name }}</h1>
                <p class="text-lg font-semibold">
                    Giá bán: <span class="uppercase text-red-600 font-normal"> Liên hệ </span></p>
                <div class="border border-[#D3D3D3] rounded-lg p-4 text-[#5E5E5E] list-disc">
                    <p class="font-semibold text-lg mb-2"> Đặc tính sản phẩm </p>
                    <div class="ml-8 text-[#2E2E2E] product-description">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="devider h-0.5 bg-gray-200"></div>

                <a href="{{route('contact'). '#contact-form'}}" class="w-full">
                    <button type="button" class="hover:bg-light-primary text-lg bg-primary-dark font-semibold rounded-xl text-white py-4 uppercase w-full">
                        Liên hệ tư vấn sản phẩm
                    </button>
                </a>
            </div>
        </div>
        <!-- End Session 2: Image & Short Information -->


        <!-- Session 3: Product Post Detail -->
        <div class="flex flex-col gap-5">
            <h2 class="text-lg uppercase font-semibold">Mô tả sản phẩm</h2>
            <div class="devider h-0.5 bg-gray-200"></div>
            <div class="text-base mt-4 px-4">
                {!! $product->post->content !!}
                <div class="border-t border-dashed border-primary-dark w-full text-right font-semibold text-primary-dark py-1 my-4">
                    {{Config::get('website.web_name')}}
                </div>
            </div>
        </div>
        <!-- End Session 3: Product Post Detail -->
    </div>
@endsection
