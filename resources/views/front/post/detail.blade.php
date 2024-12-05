@extends('layouts.appLayout')
@section('title', $post->title ?? 'Bài viết')
@section('seo')

@endsection

@section('content')
    <div class="bg-white px-5 sm:px-[10%] py-6 md:py-10">
        <!-- Session 1: Title -->
        <div class="flex justify-start items-center gap-2 mb-4 md:mb-8 font-semibold text-primary">
            <a href="{{url('/')}}"> Trang chủ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="#" class="text-gray-400">{{$post->name ?? ''}}</a>
        </div>
        <!-- End Session 1: Title -->

        <!-- Session 2: Content -->
        <div class="w-full grid md:grid-cols-3 gap-8 mb-16">
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-xl md:text-2xl font-bold text-center py-2 uppercase text-primary">{{$post->name ?? ''}}</h1>
                <div class="border-b-2  border-primary-dark mx-[25%]"></div>
                <div class="text-base mt-4 px-4">
                    {!! $post->content ?? '' !!}
                </div>
            </div>
            <div class="col-span-1">
                @include('front.common.contactInfo')
                @include('front.common.contactMe')
                @include('front.common.contactUs')
            </div>
        </div>
        <!-- End Session 2: Content -->
    </div>
@endsection
