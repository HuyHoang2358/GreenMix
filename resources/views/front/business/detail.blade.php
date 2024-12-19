@extends('layouts.appLayout')
@section('title', $business->name ?? 'Lĩnh vực kinh doanh')
@section('seo')

@endsection
@php
    $images = json_decode($business->images ?? '', true);
@endphp
@section('content')
    <div class="bg-white px-5 sm:px-[10%] py-6 sm:py-10">

        <!-- Session 1: Title -->
        <div class="flex justify-start items-center gap-2 mb-4 md:mb-8 font-semibold text-primary">
            <a href="{{url('/')}}" class="hover:text-gray-400"> Trang chủ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="{{route('business')}}" class="hover:text-gray-400"> Lĩnh vực kinh doanh</a>
            <i class="fa-solid fa-angle-right hidden md:block"></i>
            <a href="#" class="text-gray-400 hidden md:block">{{$business->name ?? ''}}</a>
        </div>
        <!-- End Session 1: Title -->

        <!-- Session 2: Content -->
        <div class="w-full grid md:grid-cols-3 gap-8 mb-16">
            <div class="col-span-1 md:col-span-2 ">
                <h1 class="text-xl md:text-2xl font-bold text-center py-2 uppercase text-primary">{{$business->name ?? ''}}</h1>
                <div class="border-b-2  border-primary-dark mx-[25%]"></div>
                <div class="text-base mt-4 px-4">
                    {!! $business->post->content ?? '' !!}
                    <div class="border-t border-dashed border-primary-dark w-full text-right font-semibold text-primary-dark py-1 my-4">
                        {{Config::get('website.web_name')}}
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10 mb-12">
                    @foreach ($fields  as $field)
                        <!--A businesses card-->
                        <a href="{{ route('business.detail', ['slug' => $field->slug]) }}"
                           class="product-card shadow-lg group flex flex-col gap-2 hover:shadow-2xl duration-300  md:max-w-[320px]">
                            <div class="overflow-hidden shadow-primary-dark">
                                @php
                                    $images = json_decode($field->images, true);
                                @endphp
                                <img src="{{ asset(reset($images)) }}" alt="{{$field->slug}}"
                                     class="aspect-square transform transition-transform duration-300 group-hover:scale-110 w-full h-full max-h-[200px]">
                            </div>
                            <div class="px-4 py-4">
                                <div class="capitalize font-semibold text-lg text-primary-dark">
                                    {{ $field->post->name }}
                                </div>
                                <div class="text-sm font-normal mt-0.5 line-clamp-2">
                                    {!! $field->post->description !!}
                                </div>
                            </div>
                        </a>
                        <!--End a businesses card-->
                    @endforeach
                </div>
            </div>
            <div class="col-span-1 md:max-w-[320px]">
                <div class="border border-primary-dark mb-8 overflow-hidden">
                    @foreach($images as $image)
                        <img src="{{asset($image)}}" alt="{{$business->slug}}" class="hover:scale-105 w-full h-full"/>
                        @break
                    @endforeach
                </div>

                <!-- Sản phẩm liên quan -->
                <div class="w-full border border-primary mb-8">
                    <div class="bg-primary">
                        <h3 class="font-semibold text-white text-lg md:text-xl uppercase py-4 text-center">Sản phẩm liên quan</h3>
                    </div>
                    <div class="flex divide-y flex-col">
                        @foreach($business-> products as $product)
                            <div class="py-2 px-4 hover:bg-light-primary hover:text-white">
                                <a href="{{route('product.detail', $product->slug)}}">{{$product->name}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>

                @include('front.common.contactInfo')
                @include('front.common.contactMe')
                @include('front.common.contactUs')
            </div>
        </div>
        <!-- End Session 2: Content -->
    </div>

@endsection
