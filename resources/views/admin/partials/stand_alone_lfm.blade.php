<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    let route_prefix = "/admin/laravel-filemanager";
    $('#post-img-preview').filemanager('images', {prefix: route_prefix});
    $('#add-post-img-preview').filemanager('files', {prefix: route_prefix});
</script>
