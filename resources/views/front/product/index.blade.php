@extends('layouts.appLayout')
@section('title', 'Dòng sản phẩm')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-[10%]  py-6 md:py-10">
        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Danh mục sản phẩm'])
        <!-- End Session 1: Title -->

        <!-- Session 2: product list-->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10  mb-12">
            @foreach ($products as $product)
                <!--A product card-->
                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                   class="product-card shadow group flex flex-col gap-2 hover:shadow-2xl duration-300  md:max-w-[320px]">
                    <div class="overflow-hidden shadow-primary-dark">
                        @php
                            $images = json_decode($product->images, true);
                        @endphp
                        <img src="{{ asset(reset($images)) }}" alt="Image"
                             class="aspect-square transform transition-transform duration-300 group-hover:scale-110 w-full h-full  max-h-[200px]">
                    </div>
                    <div class="px-4 py-4">
                        <div class="capitalize font-semibold text-lg text-primary-dark">
                            {{ $product->name }}
                        </div>
                        <div class="text-base font-semibold">
                            Giá bán: <span class="uppercase text-red-600 font-normal"> Liên hệ </span>
                        </div>
                        <div class="text-base flex font-semibold">
                            <div class="whitespace-nowrap">Ứng dụng:</div>
                            <div class="text-sm font-normal ml-2 mt-0.5 line-clamp-2"> {!! $product->post->content !!}</div>
                        </div>
                    </div>
                </a>
                <!--End a product card-->
            @endforeach
        </div>
        <!-- End Session 2: product list  -->
    </div>

@endsection
