<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
<script src="{{ asset('backend/dist/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/lucide"></script>

<script>
    // document.addEventListener('DOMContentLoaded', function () {

    //     function countWords(content) {
    //         return content.length;
    //     }

    //     var inputElement = $(".toggle-password")

    // })

    function handleCountNumberCharacter(inputId, countId, maxLength) {
        const input = document.getElementById(inputId);
        let str = input.value;
        const number = str.length;
        if (number > maxLength) {
            str = str.substring(0, maxLength)
            input.value = str;
            document.getElementById(countId).innerText = maxLength;
        } else {
            document.getElementById(countId).innerText = number;
        }
    }

    // $(".perfect-sight").each(function() {

    //     var input_id = $(this).attr('perfect-sight-for');

    //     $(".toggle-password-on").click(function() {

    //         $('#' + input_id).attr('type', 'text');
    //         $(this).addClass('hidden');
    //         $('.toggle-password-off').removeClass('hidden');

    //     });

    //     $(".toggle-password-off").click(function() {

    //         $('#' + input_id).attr('type', 'text');
    //         $(this).addClass('hidden');
    //         $('.toggle-password-on').removeClass('hidden');

    //     });

    // })

    $(".required-form").on('submit', function(event) {
        var content = tinymce.get('content').getContent();
        if (content.trim() === '') {
            event.preventDefault(); // Prevent form submission
            alert('Xin hãy điền đầy đủ các có dấu sao.');
        }
    });

    $('#togglePostFields').change(function() {
        if ($(this).is(':checked')) {
            $('#postFields').removeClass('hidden').addClass('flex');
            $('#postFields input[name="post-thumbnail"]').attr('required', 'required');
            $('#postFields input[name="post-name"]').attr('required', 'required');
            $('#postFields input[name="title"]').attr('required', 'required');
            $('#postFields input[name="post-slug"]').attr('required', 'required');
            $('#postFields input[name="post-description"]').attr('required', 'required');
            $('#product-post').addClass('required-form');
        } else {
            $('#postFields').removeClass('flex').addClass('hidden');
            $('#postFields input[name="post-thumbnail"]').removeAttr('required');;
            $('#postFields input[name="post-name"]').removeAttr('required');;
            $('#postFields input[name="title"]').removeAttr('required');;
            $('#postFields input[name="post-slug"]').removeAttr('required');;
            $('#postFields input[name="post-description"]').removeAttr('required');;
            $('#product-post').removeClass('required-form');
        }
    });

    $(document).ready(function() {

        if ($('#togglePostFields').is(':checked')) {
            $('#postFields').removeClass('hidden').addClass('flex');
        }

        function updateWordCounter() {
            $('.word-counter').each(function() {
                var inputId = $(this).attr('input-to-count');
                var maxLength = $(this).attr('max-characters');
                var inputElement = $('#' + inputId);
                var inputValue = $('#' + inputId).val();

                if (inputValue.length > maxLength) {
                    inputElement.val(inputValue.substring(0, maxLength));
                    inputValue = inputElement.val();
                }

                $(this).text(inputValue.length);
            });
        }

        // Initial update when the DOM is loaded
        updateWordCounter();

        $('input').on('input', function() {
            updateWordCounter();
        });

        function togglePasswordButton(){

            $('.perfect-sight').each(function() {

                var passwordInput = $(this).find('input[type="password"]');
                var togglePasswordOn = $(this).find('.toggle-password-on');
                if (passwordInput.val()) {
                    togglePasswordOn.removeClass('hidden');
                }else {
                    togglePasswordOn.addClass('hidden');
                }

            })

        }

        $('.perfect-sight input[type="password"]').on('input', function() {
            togglePasswordButton();
        });

        $('.perfect-sight .toggle-password-on').click(function() {
            $(this).siblings('input[type="password"]').attr('type', 'text');
            $(this).addClass('hidden');
            $(this).siblings('.toggle-password-off').removeClass('hidden');
        });

        $('.perfect-sight .toggle-password-off').click(function() {
            $(this).siblings('input[type="text"]').attr('type', 'password');
            $(this).addClass('hidden');
            $(this).siblings('.toggle-password-on').removeClass('hidden');
        });

    });
</script>
