<script>
    $(document).ready(function() {
        var slides = $('.mySlides');
        var slides2 = $('.mySlides2');
        var dotsContainer = $('#dots-container');
        var dotsContainer2 = $('.dots-container2');
        var dotIndexMap = {};

        slides.each(function(index) {
            var dot = $(
                '<span class="dot h-5 w-5 m-1 bg-white rounded-full inline-block transition ease-in-out duration-500 cursor-pointer"></span>'
            );
            if (index === 0) {
                dot.addClass('active');
            }
            dotsContainer.append(dot);
        });

        slides2.each(function(index) {
            var num_links = $(this).find('a').length;
            for (var i = 0; i < num_links; i++) {
                var dot = $('<p class="dot2 h-4 w-4 transition ease-in-out duration-500  bg-white rounded-full cursor-pointer"></p>');
                dotsContainer2.append(dot);

                dotIndexMap[index] = dotIndexMap[index] || [];
                dotIndexMap[index].push(dotsContainer2.children().length - 1);
            }
        })

        //console.log(dotIndexMap)

        let slideIndex = [1, 1];
        let slideId = ["mySlides", "mySlides2"]
        let dotId = ["dot"]
        showSlides(1, 0);
        showSlides(1, 1);

        // Next/previous controls
        function plusSlides(n, no) {
            showSlides(slideIndex[no] += n, no);
        }

        // Thumbnail image controls
        function currentSlide(n, no) {
            showSlides(slideIndex[no] = n, no);
        }

        function showSlides(n, no) {

            console.log(n)

            let i;
            let slides = document.getElementsByClassName(slideId[no]);
            let dots = document.getElementsByClassName(dotId[no]);

            if (n > slides.length) {
                slideIndex[no] = 1
            }
            if (n < 1) {
                slideIndex[no] = slides.length
            }

            //Gan style = hidden cho cac thanh phan slides
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            //if the button is targeting the second slide
            if (no == 1) {
                dot_array = dotsContainer2.find("p");
                var currentIndex = slideIndex[no] - 1;

                for (i = 0; i < dot_array.length; i++) {
                    dot_array[i].className = dot_array[i].className.replace(" dot-2-activate", "");
                }

                if (dotIndexMap[currentIndex]) {
                    dotIndexMap[currentIndex].forEach(function(dotIndex) {
                        dot_array[dotIndex].className += " dot-2-activate";
                    });
                }
                slides[currentIndex].style.display = "grid";
            } else {
                slides[slideIndex[no] - 1].style.display = "block";
                dots[slideIndex[no] - 1].className += " active";
            }

        }

        // Attach click event handlers using jQuery
        $('.prev').click(function() {
            plusSlides(-1, $(this).attr('slide-id'));
        });

        $('.next').click(function() {
            plusSlides(1, $(this).attr('slide-id'));
        });

        // Attach click event handlers for dots
        $('.dot').click(function() {
            var index = $(this).index();
            currentSlide(index + 1, 0);
        });

        // Attach click event handlers for dot2s
        $('.dot2').click(function() {
            var index = $(this).index();
            var key = findKeyByDotIndex(index);
            //console.log(key);
            currentSlide(parseInt(key) + 1, 1);
        });

        function findKeyByDotIndex(dotIndex) {
            for (var key in dotIndexMap) {
                if (dotIndexMap[key].includes(dotIndex)) {
                    return key;
                }
            }
            return null;
        }

    });

    function removeTag() {

        if (window.innerWidth < 640) {
            $('.dot-2-when-big').removeAttr('id');
            $('.dot-2-when-small').attr('id', 'dots-container2');
        } else {
            console.log(window.innerWidth)
            $('.dot-2-when-small').removeAttr('id');
            $('.dot-2-when-big').attr('id', 'dots-container2');
        }
    }

    // Initial check
    removeTag();

    // Listen for window resize
    window.addEventListener('resize', removeTag,  { once: true });

</script>
