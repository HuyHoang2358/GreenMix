
<div class="slideshow-container relative">
    @foreach($banners as $banner)
    <!--Slide items-->
    <div class="mySlides fade">
        <div class="relative min-h-[469px] sm:min-h-[50.625rem] overflow-clip bg-cover sm:bg-cover bg-[center_center]"
            style="background-image: url('{{ asset($banner->path) }}')">
            <div
                class="absolute top-32 left-6 sm:top-1/4 sm:left-16 bg-white rounded-3xl bg-opacity-70 font-extrabold uppercase px-2 py-6 sm:py-12 sm:px-7">
                <div
                    class="text-xl sm:text-4xl mb-2 sm:mb-7 text-secondary whitespace-normal leading-tight max-w-64 sm:max-w-2xl">
                    {{$banner->title}}
                </div>
                <a href="{{$banner->attach_link}}" target="_blank">
                    <button
                        type="button"
                        class="uppercase text-xs sm:text-2xl bg-primary-dark px-3 py-3 sm:px-7 sm:py-6 rounded-xl text-white">
                        Xem chi tiết
                    </button>
                </a>
            </div>
        </div>
    </div>
    @endforeach

    <a class="prev absolute top-1/2 left-2 transform -translate-y-1/2 p-4 font-bold text-3xl transition ease-in-out duration-500 rounded cursor-pointer select-none hover:bg-green-700/[0.7] hover:text-white" onclick="plusSlides(-1)"><i class="fa-solid fa-chevron-left"></i></a>
    <a class="next absolute top-1/2 right-2 transform -translate-y-1/2 p-4 font-bold text-3xl transition ease-in-out duration-500 rounded cursor-pointer select-none hover:bg-green-700/[0.7] hover:text-white" onclick="plusSlides(1)"><i class="fa-solid fa-chevron-right"></i></a>

    <!-- The dots/circles -->
    <div id="dots-container" class="absolute bottom-8 right-1 left-1 sm:right-1/3 sm:left-1/3 flex justify-center gap-2"
        style="text-align:center">
    </div>

</div>

<style>

    /* Hide the slides by default */
    .mySlides {
        display: none;
    }

    .active {
        background-color: #717171;
    }

    .accordion-active{
        background-color: #27A965;
        border: #27A965;
        color: white;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }
</style>

<script>
    $(document).ready(function() {
        var slides = $('.mySlides');
        var dotsContainer = $('#dots-container');

        slides.each(function(index) {
            var dot = $('<span class="dot h-5 w-5 m-1 bg-white rounded-full inline-block transition ease-in-out duration-500 cursor-pointer" onclick="currentSlide(' + (index + 1) + ')"></span>');
            if (index === 0) {
                dot.addClass('active');
            }
            dotsContainer.append(dot);
        });
    });

    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {

        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");

        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }

        //Gan style = hidden cho cac thanh phan slides
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";

    }

</script>
