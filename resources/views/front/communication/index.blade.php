@extends('layouts.appLayout')
@section('title', 'Truyền thông về greenMix')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-[10%] py-6 md:py-10">
        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Truyền thông về greenMix'])
        <!-- End Session 1: Title -->

        <!-- Session 2: Communications list-->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10 mb-12">
            @foreach ($communications as $item)
                <!--A businesses card-->
                <a href="{{ route('communication.detail', ['slug' => $item->slug]) }}"
                    class="product-card shadow-lg group flex flex-col gap-2 hover:shadow-2xl duration-300   md:max-w-[320px]">
                    <div class="overflow-hidden shadow-primary-dark">
                        <img src="{{ asset($item->images) }}" alt="{{$item->slug}}"
                            class="aspect-square transform transition-transform duration-300 group-hover:scale-110 w-full h-full  max-h-[200px]">
                    </div>
                    <div class="px-4 py-4 border-t border-gray-300">
                        <div class="capitalize font-semibold text-lg text-primary-dark">
                            {{ $item->name }}
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            {{ $item->description }}
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            <span class="font-semibold">Ngày đăng: </span>
                            {{ date('d/m/Y', strtotime($item->updated_at)) }}
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
