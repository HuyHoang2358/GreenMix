@extends('layouts.appLayout')
@section('title', 'Dòng sản phẩm')
@section('seo')
    
@endsection
@php
    $images = json_decode($product->images, true);
@endphp
@section('content')

    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">
        <!-- Session 1: Title -->
        <div class="title uppercase text-xl font-semibold mb-10">
            Danh mục sản phẩm <i class="fa-solid fa-chevron-right ml-2"></i>
        </div>
        <!-- End Session 1: Title -->


        <!-- Session 2: Image & Short Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 mb-10 gap-5">
            <img src="{{ asset(reset($images)) }}" alt="" class="aspect-square">
            <div class="flex flex-col gap-5">
                <p class="text-3xl font-semibold text-primary-dark capitalize">{{ $product->name }}</p>
                <p class="text-2xl font-semibold">
                    Giá bán: <span class="uppercase text-red-600 font-normal"> Liên hệ </span></p>
                <div class="border-2 rounded-xl px-5 py-7 text-lg">
                    {!! $product->post->content !!}
                </div>
                <div class="devider h-0.5 bg-gray-200"></div>
                <button class="text-2xl bg-primary-dark font-semibold rounded-xl text-white py-7 uppercase">
                    Liên hệ tư vấn sản phẩm
                </button>
            </div>
        </div>
        <!-- End Session 2: Image & Short Information -->


        <!-- Session 3: Business Post Detail -->
        <div class="flex flex-col gap-5">
            <p class="text-2xl uppercase font-semibold">Mô tả sản phẩm</p>
            <div class="devider h-0.5 bg-gray-200"></div>
            <p class="text-lg">
                {{ $product->description }}
            </p>
            <div class="flex justify-center flex-col gap-5 sm:px-60">
                @foreach (array_slice($images, 1) as $image)
                    <img src="{{ asset($image) }}" alt="" class="aspect-video">
                @endforeach
            </div>
        </div>
        <!-- End Session 3: Business Post Detail -->
    </div>
@endsection
