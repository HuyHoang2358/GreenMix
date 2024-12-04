<div class="w-full border border-primary my-8">
    <div class="bg-primary">
        <h3 class="font-semibold text-white text-xl uppercase py-4 text-center">Liên hệ tư vấn</h3>
    </div>
    <div class="flex divide-y flex-col">
        <div class="py-2 px-4 flex justify-start items-center gap-2">
            <div class="w-8">
                <i class="fa-solid fa-phone fa-shake text-primary-dark text-lg"></i>
            </div>
            <p class="font-semibold">{{config('website.top_hotline_1')}}</p>
        </div>
        <div class="py-2 px-4 flex justify-start items-center gap-2">
            <div class="w-8">
                <i class="fa-solid fa-phone fa-shake text-primary-dark text-lg"></i>
            </div>
            <p class="font-semibold">{{config('website.top_hotline_2')}}</p>
        </div>
        <div class="py-2 px-4 flex justify-start items-center gap-2">
            <div class="w-8">
                <i class="fa-solid fa-envelope-open-text fa-bounce text-primary-dark text-lg"></i>
            </div>
            <p class="font-semibold">{{config('website.email')}}</p>
        </div>

        @foreach($addresses as $address)
            <div class="py-2 px-4 flex justify-start items-center gap-2">
                <div class="w-8">
                    <i class="fa-solid fa-location-dot fa-beat text-primary-dark text-lg"></i>
                </div>
                <p class="font-semibold">{{$address->name}}</p>
            </div>
        @endforeach
    </div>
</div>
