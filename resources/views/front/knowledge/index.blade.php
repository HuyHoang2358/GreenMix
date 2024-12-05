@extends('layouts.appLayout')
@section('title', 'Kiến thức')
@section('seo')

@endsection
@section('content')

    <div class="bg-white px-5 sm:px-[10%] py-6 md:py-10">
        <!-- Session 1: Title -->
        @include('front.common.pageTitle', ['pageTitle' => 'Kiến thức xây dựng'])
        <!-- End Session 1: Title -->

        <!-- Session 2: Business list-->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 sm:gap-10 mb-12">
            @foreach ($items as $item)
                <!--A businesses card-->
                <a href="{{ route('knowledge.detail', ['slug' => $item->slug]) }}"
                    class="product-card shadow-lg group flex flex-col gap-2 hover:shadow-2xl duration-300  md:max-w-[320px]">
                    <div class="overflow-hidden shadow-primary-dark">
                        <img src="{{ asset($item->post->images) }}" alt="{{$item->slug}}"
                            class="aspect-square transform transition-transform duration-300 group-hover:scale-110 w-full h-full max-h-[200px]">
                    </div>
                    <div class="px-4 py-4">
                        <div class="capitalize font-semibold text-lg text-primary-dark">
                            {{ $item->name }}
                        </div>
                        <div class="text-sm font-normal mt-0.5 line-clamp-2">
                            {!! $item->post->description !!}
                        </div>
                    </div>
                </a>
                <!--End a businesses card-->
            @endforeach
        </div>
        <!-- End Session 2: Business list  -->
    </div>

@endsection
