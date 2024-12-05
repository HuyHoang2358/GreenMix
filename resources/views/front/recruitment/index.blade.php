@extends('layouts.appLayout')
@section('title', 'Tuyển dụng')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">
        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Thông tin tuyển dụng'])
        <!-- End Session 1: Title -->

        <!-- Session 2: Business list-->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10 mb-12">
            @foreach ($recruitments as $item)
                <!--A businesses card-->
                <a href="{{ route('recruitment.detail', ['slug' => $item->slug]) }}"
                    class="product-card shadow-lg group flex flex-col gap-2 hover:shadow-2xl duration-300  max-w-[320px]">
                    <div class="overflow-hidden shadow-primary-dark border-b border-gray-200">
                        <img src="{{ asset($item->category->icon) }}" alt="{{$item->slug}}"
                            class="aspect-square transform transition-transform duration-300 group-hover:scale-110 w-full max-h-[280px]">
                    </div>
                    <div class="px-4 py-4">
                        <div class="capitalize font-semibold text-lg text-primary-dark">
                            {{ $item->name }}
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            <p><span class="font-semibold">Thời gian: </span>{{$item->start_date}} - {{$item->end_date}}</p>
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            <p><span class="font-semibold">Vị trí: </span>{{$item->address}}</p>
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            <p><span class="font-semibold">Số lượng: </span>{{$item->num_people}}</p>
                        </div>
                    </div>
                </a>
                <!--End a businesses card-->
            @endforeach

        </div>
        <!-- End Session 2: Business list  -->
    </div>

@endsection
