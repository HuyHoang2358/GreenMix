<div class="grid md:grid-cols-2 bg-[#747474] gap-4 p-8 md:px-[10%] md:py-12 text-white">
    <div class="col-span-1 md:px-20">
        <img src="{{config('website.logo')}}" alt="greenMix-logo" class="max-w-48">
        <h3 class="font-semibold text-lg md:text-lg text-primary pt-3 uppercase">{{Config::get('website.company_name')}}</h3>
        @foreach($addresses as $address)
        <div class="py-2 mt-2 text-sm md:text-base">
            <div class="flex gap-1 items-center">
                <div class="w-4 h-5">
                    <svg class="w-full h-full" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5226 0.669126C4.08322 -0.237663 6.00148 -0.221813 7.54746 0.710643C9.07824 1.66209 10.0086 3.36015 9.99994 5.18678C9.96431 7.00142 8.96669 8.7072 7.71967 10.0258C6.99992 10.7904 6.19476 11.4664 5.32063 12.0401C5.23061 12.0922 5.132 12.127 5.02966 12.1429C4.93117 12.1387 4.83526 12.1096 4.75057 12.0582C3.41604 11.1962 2.24525 10.0958 1.29453 8.81003C0.498995 7.73673 0.0470258 6.44004 8.29814e-07 5.09604C-0.00103192 3.26591 0.961981 1.57592 2.5226 0.669126ZM3.42468 5.85365C3.68719 6.50083 4.30684 6.92299 4.99429 6.92299C5.44464 6.92622 5.87756 6.74583 6.19658 6.42201C6.5156 6.09818 6.69421 5.65783 6.69261 5.19907C6.69502 4.49882 6.28276 3.86616 5.64833 3.59649C5.01391 3.32682 4.28245 3.47333 3.7955 3.96761C3.30855 4.4619 3.16216 5.20646 3.42468 5.85365Z" fill="white"/>
                        <ellipse opacity="0.4" cx="4.99967" cy="13.5715" rx="3.57145" ry="0.71429" fill="white"/>
                    </svg>
                </div>
                <p class="font-semibold">{{$address -> name}}</p>
            </div>
            <ul class="list-disc ml-8 mt-1">
                <li class="font-light text-sm">{{$address -> detail}}</li>
            </ul>
        </div>
        @endforeach
        <div class="py-2 text-sm md:text-base">
            <div class="flex gap-2 items-center">
                <div class="w-4 h-5">
                    <svg class="w-full h-full" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="phone">
                            <path id="Path 16" d="M8.49386 12.2691L10.0062 10.7567C10.3489 10.414 10.8879 10.3664 11.2854 10.6436L13.2963 12.0461C13.703 12.3298 13.7545 12.9121 13.4039 13.2628V13.2628C12.838 13.8286 12.0255 14.0743 11.2673 13.8186C9.85791 13.3433 7.48826 12.3157 5.50783 10.3353C3.52739 8.35488 2.49985 5.98523 2.02454 4.57588C1.76882 3.81766 2.01453 3.00509 2.58034 2.43927V2.43927C2.931 2.08862 3.51337 2.14012 3.79705 2.54686L5.19954 4.55776C5.47676 4.95523 5.4291 5.49426 5.08644 5.83692L3.57408 7.34928" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </g>
                    </svg>
                </div>
                <p class="font-semibold">Hotline</p>
            </div>
            <ul class="list-disc ml-8 mt-1">
                <li class="font-light text-sm">{{config('website.top_hotline_1')}}</li>
                <li class="font-light text-sm">{{config('website.top_hotline_2')}}</li>
            </ul>
        </div>
        <div class="py-2 text-sm md:text-base">
            <div class="flex gap-2 items-center">
                <div class="w-4 h-6">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <p class="font-semibold">Email</p>
            </div>
            <ul class="list-disc ml-8 mt-1">
                <li class="font-light text-sm">{{config('website.email')}}</li>
            </ul>
        </div>
        <div class="flex md:gap-7 md:text-2xl items-center pt-2 md:pt-5">
            <a href="{{ Config::get('website.facebook_url') }}">
                <img class="w-24 h-12" src="{{asset('images/logo/facebook.png')}}" alt="{{asset('images/logo/facebook.png')}}"></img>
            </a>
            <a href="{{ Config::get('website.youtube_url') }}">
                <img class="w-20 h-10" src="{{asset('images/logo/youtube.png')}}" alt="{{asset('images/logo/youtube.png')}}"></img>
            </a>
            <a href="{{ Config::get('website.tiktok_url') }}">
                <img class="w-20 h-10" src="{{asset('images/logo/tiktok.png')}}" alt="{{asset('images/logo/tiktok.png')}}"></img>
            </a>
        </div>
    </div>
    <div class="col-span-1 grid md:grid-cols-2 mt-10 md:mt-0">
        <div class="col-span-1">
            <h3 class="font-semibold text-left text-bas">DANH MỤC SẢN PHẨM</h3>
            <ul class="list-disc ml-4 pt-5 flex flex-col gap-3 text-md">
                @foreach($footerProducts as $product)
                    <li><a href="{{route('product.detail', $product->slug)}}" class="hover:text-primary">{{$product->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-span-1 mt-10 md:mt-0">
            <h3 class="pb-2 font-semibold text-base">BẢN ĐỒ</h3>
            @foreach($addresses as $address)
                @if($address->is_show == 1)
                <div class="py-3">
                    <div class="flex gap-1 items-center">
                        <div class="w-4 h-5">
                            <svg class="w-full h-full" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5226 0.669126C4.08322 -0.237663 6.00148 -0.221813 7.54746 0.710643C9.07824 1.66209 10.0086 3.36015 9.99994 5.18678C9.96431 7.00142 8.96669 8.7072 7.71967 10.0258C6.99992 10.7904 6.19476 11.4664 5.32063 12.0401C5.23061 12.0922 5.132 12.127 5.02966 12.1429C4.93117 12.1387 4.83526 12.1096 4.75057 12.0582C3.41604 11.1962 2.24525 10.0958 1.29453 8.81003C0.498995 7.73673 0.0470258 6.44004 8.29814e-07 5.09604C-0.00103192 3.26591 0.961981 1.57592 2.5226 0.669126ZM3.42468 5.85365C3.68719 6.50083 4.30684 6.92299 4.99429 6.92299C5.44464 6.92622 5.87756 6.74583 6.19658 6.42201C6.5156 6.09818 6.69421 5.65783 6.69261 5.19907C6.69502 4.49882 6.28276 3.86616 5.64833 3.59649C5.01391 3.32682 4.28245 3.47333 3.7955 3.96761C3.30855 4.4619 3.16216 5.20646 3.42468 5.85365Z" fill="white"/>
                                <ellipse opacity="0.4" cx="4.99967" cy="13.5715" rx="3.57145" ry="0.71429" fill="white"/>
                            </svg>
                        </div>
                        <p class="font-semibold">{{$address -> name}}</p>
                    </div>
                    <iframe src="{{$address -> iframe}}" class="mt-2"></iframe>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="bg-primary-dark h-12 w-full"></div>




