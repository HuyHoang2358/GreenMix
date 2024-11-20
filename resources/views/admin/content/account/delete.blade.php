<form method="POST" action="{{ route('admin.account.destroy') }}" id="delete-account-form" class="modal" tabindex="-1" aria-hidden="true">
    @csrf
    @method('delete')
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                    <input type="hidden" id="del-account-id" name="del-account-id">
                    <div class="text-3xl mt-5">Bạn chắc chứ?</div>
                    <div class="text-slate-500 mt-2">
                        Bạn có muốn xóa tài khoản "<span id="del-account-name"></span>" khỏi bảng ghi? 
                        <br>
                        Hành động này sẽ không thể hoàn tác.
                    </div>
                    <div class="px-5 relative perfect-sight">
                        <input required id="password" name="password" type="password" class="form-control mt-2" placeholder="Nhập mật khẩu hiện tại để tiếp tục">
                        <i class="absolute toggle-password-on hidden" style="top: 30%; right: 6%; cursor: pointer;" data-lucide="eye"></i>
                        <i class="absolute toggle-password-off hidden" style="top: 30%; right: 6%; cursor: pointer;" data-lucide="eye-off"></i>
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