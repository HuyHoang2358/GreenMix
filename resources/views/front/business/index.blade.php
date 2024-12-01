@extends('layouts.appLayout')
@section('title', 'Lĩnh vực kinh doanh')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">
        <!-- Session 1: Title -->
        <div class="title uppercase text-xl font-semibold mb-10">
            Lĩnh vực kinh doanh <i class="fa-solid fa-chevron-right ml-2"></i>
        </div>
        <!-- End Session 1: Title -->

        <!-- Session 2: Business list-->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10">
            @foreach ($businesses as $business)
                <!--A businesses card-->
                <a href="{{ route('business.detail', ['slug' => $business->slug]) }}"
                    class="product-card group flex flex-col gap-2 hover:shadow-2xl hover:cursor-pointer duration-300 rounded-b-xl">
                    <div class="overflow-hidden shadow-primary-dark">
                        @php
                            $images = json_decode($business->images, true);
                        @endphp
                        <img src="{{ asset(reset($images)) }}" alt="Image"
                            class="aspect-square transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="px-2 pb-2">
                        <div class="capitalize font-semibold text-lg text-primary-dark">
                            {{ $business->post->name }}
                        </div>
                        <div class="text-base flex font-semibold">
                            <div class="whitespace-nowrap">Nội dung:</div>
                            <div class="text-sm font-normal ml-2 mt-0.5 line-clamp-2"> {!! $business->post->content !!}</div>
                        </div>
                    </div>
                </a>
                <!--End a businesses card-->
            @endforeach

        </div>
        <!-- End Session 2: Business list  -->
    </div>

@endsection
