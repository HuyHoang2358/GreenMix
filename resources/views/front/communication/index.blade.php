@extends('layouts.appLayout')
@section('title', 'Truyền thông về greenMix')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-52 py-10 sm:py-10">
        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Truyền thông về greenMix'])
        <!-- End Session 1: Title -->

        <!-- Session 2: Communications list-->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10 mb-12">
            @foreach ($communications as $item)
                <!--A businesses card-->
                <a href="{{ route('business.detail', ['slug' => $item->slug]) }}"
                    class="product-card shadow-lg group flex flex-col gap-2 hover:shadow-2xl duration-300  max-w-[320px] max-h-[320px]">
                    <div class="overflow-hidden shadow-primary-dark">
                        <img src="{{ asset($item->images) }}" alt="{{$item->slug}}"
                            class="aspect-square transform transition-transform duration-300 group-hover:scale-110 w-full">
                    </div>
                    <div class="px-4 py-4">
                        <div class="capitalize font-semibold text-lg text-primary-dark">
                            {{ $item->name }}
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            {{ $item->description }}
                        </div>
                    </div>
                </a>
                <!--End a Communications card-->
            @endforeach
        </div>
        <div class="bg-white">
            {{ $communications->links() }}
        </div>
        <!-- End Session 2: Business list  -->
    </div>

@endsection
