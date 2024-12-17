@extends('layouts.appLayout')
@section('title', 'Đối tác kinh doanh')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-[10%] py-6 md:py-10">
        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Đối tác kinh doanh'])
        <!-- End Session 1: Title -->

        <!-- Session 2: Đối tác Cty-->
        <div class="px-4 md:px-32 py-10 my-4 md:my-20" id="partners">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-2 md:gap-7">
                @foreach($partners as $partner)
                    <a href="{{$partner->url ?? '#'}}">
                        <div class="col-span-1 md:w-[230px] h-[120px]">
                            <img class="w-full h-full shadow-lg hover:opacity-50 border border-gray-400" src="{{asset($partner->logo)}}" alt="">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <!-- End Session 2: Đối tác Cty  -->
    </div>

@endsection
