<form method="GET" action="{{ route('admin.product.destroy') }}" id="delete-product-form" class="modal" tabindex="-1" aria-hidden="true">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                    <input type="hidden" id="del-product-id" name="del-product-id">
                    <div class="text-3xl mt-5">Bạn chắc chứ?</div>
                    <div class="text-slate-500 mt-2">
                        Bạn có muốn xóa sản phẩm "<span id="del-product-name"></span>" và bài viết liên quan khỏi bảng ghi? 
                        <br>
                        Hành động này sẽ không thể hoàn tác.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                    <button type="submit" class="btn btn-danger w-24">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</form>