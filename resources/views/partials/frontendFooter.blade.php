<div class="grid md:grid-cols-4 bg-[#747474] p-8 md:px-32 md:py-12 text-white">
    <div class="col-span-2 md:px-24">
        <img src="{{config('website.logo')}}" alt="">
        <h3 class="font-semibold text-base md:text-lg text-primary pt-3 uppercase">{{Config::get('website.company_name')}}</h3>
        @foreach($addresses as $address)
        <div class="py-2 text-sm md:text-base">
            <div class="flex gap-2">
                <i class="fa-solid fa-location-dot"></i>
                <p>{{$address -> name}}</p>
            </div>
            <ul class="list-disc ml-8">
                <li>{{$address -> detail}}</li>
            </ul>
        </div>
        @endforeach
        <div class="py-2 text-sm md:text-base">
            <h3><i class="fa-solid fa-phone mr-2"></i>Hotline</h3>
            <ul class="list-disc ml-8">
                <li>{{config('website.top_hotline_1')}}</li>
                <li>{{config('website.top_hotline_2')}}</li>
            </ul>
        </div>
        <div class="py-2 text-sm md:text-base">
            <h3><i class="fa-solid fa-envelope mr-2"></i>Email</h3>
            <ul class="list-disc ml-8">
                <li>{{config('website.email')}}</li>

            </ul>
        </div>
        <div class="flex gap-5 md:gap-7 md:text-3xl pt-2 md:pt-5 text-2xl">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-youtube"></i>
            <i class="fa-brands fa-tiktok"></i>
        </div>
    </div>
    <div class="col-span-2 grid md:grid-cols-2 mt-10 md:mt-0">
        <div class="col-span-1">
            <h3 class="font-medium">DANH MỤC SẢN PHẨM</h3>
            <ul class="list-disc ml-6 pt-5 flex flex-col gap-3 text-md">
                @foreach($footerProducts as $product)
                    <li><a href="{{route('product.detail', $product->slug)}}" class="hover:text-primary">{{$product->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-span-1 mt-10 md:mt-0">
            <h3 class="pb-3">BẢN ĐỒ</h3>
            @foreach($addresses as $address)
                @if($address->is_show == 1)
                <div class="py-3">
                    <div class="flex gap-2 mb-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>{{$address -> name}}</p>
                    </div>
                    <iframe src="{{$address -> iframe}}"></iframe>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>



