@extends('layouts.appLayout')
@section('title', 'Lĩnh vực kinh doanh')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">
        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Lĩnh vực kinh doanh'])
        <!-- End Session 1: Title -->

        <!-- Session 2: Business list-->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10 mb-12">
            @foreach ($businesses as $business)
                <!--A businesses card-->
                <a href="{{ route('business.detail', ['slug' => $business->slug]) }}"
                    class="product-card shadow-lg group flex flex-col gap-2 hover:shadow-2xl duration-300  max-w-[320px] max-h-[320px]">
                    <div class="overflow-hidden shadow-primary-dark">
                        @php
                            $images = json_decode($business->images, true);
                        @endphp
                        <img src="{{ asset(reset($images)) }}" alt="{{$business->slug}}"
                            class="aspect-square transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="px-4 py-4">
                        <div class="capitalize font-semibold text-lg text-primary-dark">
                            {{ $business->post->name }}
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            {!! $business->post->content !!}
                        </div>
                    </div>
                </a>
                <!--End a businesses card-->
            @endforeach

        </div>
        <!-- End Session 2: Business list  -->
    </div>

@endsection
