@if(isset($routeDelete))
    <form method="POST" action="{{ $routeDelete }}" id="delete-object-confirm-form" class="modal" tabindex="-1" aria-hidden="true">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="px-5 pt-4 py-2  text-center flex justify-between items-center">
                        <p class="font-bold text-lg">Xác nhận xóa</p>
                        <button type="button" data-tw-dismiss="modal" class="p-2 bg-green-500">
                            <i data-lucide="x-circle" class="w-6 h-6 text-danger"></i>
                        </button>
                    </div>
                    <div class="px-5 pb-4">
                        <div class="text-slate-500 mt-2">
                            <p class="font-semibold">Bạn có muốn xóa <span id="del-object-name" class="font-bold text-red-600">xxxx</span> khỏi bảng?</p>
                            <p class="text-gray-500 text-xs mt-1">Hành động này sẽ không thể hoàn tác.</p>
                        </div>
                        <input type="hidden" id="del-object-id" name="del-object-id">
                    </div>
                    <div class="px-5 pb-8 text-center flex justify-end items-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        <button type="submit" class="btn btn-danger w-24">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif
<script>
    function openConfirmDeleteObjectForm(name, id) {
        document.getElementById('del-object-name').textContent = name;
        document.getElementById('del-object-id').value = id;
    }
</script>