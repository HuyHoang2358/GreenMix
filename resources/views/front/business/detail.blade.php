@extends('layouts.appLayout')
@section('title', 'Lĩnh vực kinh doanh')
@section('seo')

@endsection
@php
    $images = json_decode($business->images, true);
@endphp
@section('content')
    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">

        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Lĩnh vực kinh doanh'])
        <!-- End Session 1: Title -->


        <!-- Session 2: Image & Short Information -->
        <div class="grid grid-cols-1 sm:grid-cols-2 mb-10 gap-16 px-4 ">
            <div class="col-span-1 ">
                <img src="{{ asset(reset($images)) }}" alt="{{$business->slug}}" class="aspect-square w-full h-full">
            </div>

            <div class="flex flex-col gap-5">
                <h2 class="text-3xl font-semibold text-primary-dark capitalize">{{ $business->name }}</h2>
                <div class="border-2 rounded-xl px-5 py-7 text-lg">
                    {!! $business->post->content !!}
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
                {{ $business->description }}
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
