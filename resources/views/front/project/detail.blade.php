@extends('layouts.appLayout')
@section('title', $project->name ?? 'Dự án chi tiết')
@section('seo')

@endsection

@section('content')
    <div class="bg-white px-5 sm:px-[10%] py-6 sm:py-10">

        <!-- Session 1: Title -->
        <div class="flex justify-start items-center gap-2 mb-4 md:mb-8 font-semibold text-primary">
            <a href="{{url('/')}}" class="hover:text-gray-400"> Trang chủ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="{{route('project')}}" class="hover:text-gray-400"> Dự án chi tiết</a>
            <i class="fa-solid fa-angle-right hidden md:block"></i>
            <a href="#" class="text-gray-400 hidden md:block">{{$project->name ?? ''}}</a>
        </div>
        <!-- End Session 1: Title -->

        <!-- Session 2: Content -->
        <div class="w-full grid md:grid-cols-3 gap-8 mb-16">
            <div class="col-span-1 md:col-span-2 ">
                <h1 class="text-xl md:text-2xl font-bold text-center py-2 uppercase text-primary">{{$project->name ?? ''}}</h1>
                <div class="border-b-2  border-primary-dark mx-[25%]"></div>
                <div class="text-base mt-4 px-4">
                    {!! $project->post->content ?? '' !!}
                    <div class="border-t border-dashed border-primary-dark w-full text-right font-semibold text-primary-dark py-1 my-4">
                        {{Config::get('website.web_name')}}
                    </div>
                </div>

            </div>
            <div class="col-span-1 md:max-w-[320px]">
                <div class="border border-primary-dark mb-8 overflow-hidden">
                    <img src="{{ $project->image }}" alt="{{$project->slug}}" class="hover:scale-105 w-full h-full"/>

                </div>

                @include('front.common.contactInfo')
                @include('front.common.contactMe')
                @include('front.common.contactUs')
            </div>
        </div>
        <!-- End Session 2: Content -->
    </div>

@endsection
