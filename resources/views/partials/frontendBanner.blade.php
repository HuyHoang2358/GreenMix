
<div class="slideshow-container relative">
    @foreach($banners as $banner)
    <!--Slide items-->
    <div class="mySlides fade">
        <div class="relative min-h-screen overflow-clip bg-cover sm:bg-cover bg-[center_center]"
            style="background-image: url('{{ asset($banner->path) }}')">
            <div
                class="absolute top-40 left-6 sm:top-1/4 sm:left-16 bg-white rounded-3xl bg-opacity-70 font-extrabold px-2 py-6 sm:py-12 sm:px-7">
                <div
                    class="text-xl sm:text-3xl mb-2 sm:mb-7 text-secondary whitespace-normal max-w-64 sm:max-w-2xl leading-8 uppercase">
                    {{$banner->title}}
                </div>
                <a href="{{$banner->attach_link}}" target="_blank">
                    <button
                        type="button"
                        class="text-xs sm:text-2xl bg-primary-dark px-3 py-3 sm:px-8 sm:py-4 rounded-xl text-white uppercase">
                        Xem chi tiết
                    </button>
                </a>
            </div>
        </div>
    </div>
    @endforeach

    <a class="prev absolute top-1/2 left-2 transform -translate-y-1/2 p-4 font-bold text-3xl transition ease-in-out duration-500 rounded cursor-pointer select-none hover:bg-green-700/[0.7] hover:text-white" slide-id="0"><i class="fa-solid fa-chevron-left"></i></a>
    <a class="next absolute top-1/2 right-2 transform -translate-y-1/2 p-4 font-bold text-3xl transition ease-in-out duration-500 rounded cursor-pointer select-none hover:bg-green-700/[0.7] hover:text-white" slide-id="0"><i class="fa-solid fa-chevron-right"></i></a>

    <!-- The dots/circles -->
    <div id="dots-container" class="absolute bottom-8 right-1 left-1 sm:right-1/3 sm:left-1/3 flex justify-center gap-2"
        style="text-align:center">
    </div>

</div>



