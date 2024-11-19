<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
<script src="{{ asset('backend/dist/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/lucide"></script>

<script>
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

    // $(".required-form").on('submit', function(event) {
    //     var content = tinymce.get('content').getContent();

    //     var toggleField = $('#togglePostFields');

    //     if (toggleField) {
    //         if (toggleField.is(':checked')) {
    //             if (content.trim() === '') {
    //                 event.preventDefault(); // Prevent form submission
    //                 alert('Xin hãy điền đầy đủ các có dấu sao.');
    //             }
    //         } else {
    //             return;
    //         }
    //     }

    //     if (content.trim() === '') {
    //         event.preventDefault(); // Prevent form submission
    //         alert('Xin hãy điền đầy đủ các có dấu sao.');
    //     }

    // });

    $('#recruitment-form').on('submit', function(e) {
        var startDate = new Date($('#start_date').val());
        var endDate = new Date($('#end_date').val());
        var num_people = $('#num_people').val()

        if (endDate <= startDate) {
            e.preventDefault(); // Prevent form submission
            alert('Hạn cuối phải sau ngày bắt đầu tuyển dụng.');
        }
        if(num_people <= 0) {
            e.preventDefault(); // Prevent form submission
            alert('Số lượng nhân sự phải lớn hơn 0.');
        }
    });

    // toggle post field on the product page
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
    //end toggle post field on the product page

    $(document).ready(function() {

        if ($('#togglePostFields').is(':checked')) {
            $('#postFields').removeClass('hidden').addClass('flex');
        }

        // start word counter
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

        updateWordCounter();

        $('input').on('input', function() {
            updateWordCounter();
        });
        // end word counter

        // start toggle password
        function togglePasswordButton() {

            $('.perfect-sight').each(function() {

                var passwordInput = $(this).find('input[type="password"]');
                var togglePasswordOn = $(this).find('.toggle-password-on');
                if (passwordInput.val()) {
                    togglePasswordOn.removeClass('hidden');
                } else {
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
        // end toggle password

        // image eraser button
        $('.images-eraser').click(function() {
            // Clear the input value
            var input = $('#' + $(this).attr('input-to-clear'));
            input.val('');

            // Remove all img tags inside the holder div
            var holder = $('#' + $(this).attr('holder-to-clear'));
            holder.find('img').remove();

            holder.append(
                '<div class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-40 h-20 overflow-hidden text-center">Chưa có hình ảnh xem trước</div>'
            );
        });
        //end image eraser button

        // add readonly function for img tags
        $(".readonly").on('keydown paste focus mousedown', function(e) {
            if (e.keyCode != 9) // ignore tab
                e.preventDefault();
        });
        //end add readonly function for img tags
    });
</script>

