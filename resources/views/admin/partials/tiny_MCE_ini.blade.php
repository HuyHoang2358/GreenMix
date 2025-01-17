<script src="https://cdn.tiny.cloud/1/af6s904lyfpr5w3pids1ap9ei06381sfv7ne6e6eju3fpwis/tinymce/5/tinymce.min.js"
        referrerpolicy="origin">
</script>

<script>
    var editor_config = {
        path_absolute: "/",
        selector: '#content',
        resize: false,
        height: 500,
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback: function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'admin/laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init({
            selector: '#post-description',
            toolbar: false,
            menubar: false,
            resize: false,
     });

    tinymce.init({
        selector: '#seo-description',
        height: 270,
        toolbar: false,
        menubar: false,
        resize: false,
    });

    tinymce.init({
        selector: '#recruitment-description',
        height: 250,
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        menubar: false,
        resize: false,
    });

    tinymce.init({
        selector: '#recruitment-requirement',
        height: 250,
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        menubar: false,
        resize: false,
    });

    tinymce.init({
        selector: '#recruitment-benefit',
        height: 250,
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        menubar: false,
        resize: false,
    });

    tinymce.init(editor_config);
</script>
