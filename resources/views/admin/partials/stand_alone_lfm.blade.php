<div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
    <div class="form-label xl:w-64 xl:!mr-10">
        <div class="text-left">
            <div class="flex items-center">
                <div class="font-medium">Hình ảnh</div>
                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
            </div>
            <div class="leading-relaxed text-slate-500 text-xs mt-3">Hình ảnh sẽ giúp bài đăng của bạn ấn tượng hơn</div>
        </div>
    </div>
    <div class="w-full  mt-3 xl:mt-0 flex-1 gap-2">
        <div class="grid grid-cols-4 gap-2">
            <div class="col-span-3">
                <div class="w-full mt-3 xl:mt-0 flex-1 flex gap-2">
                    <p class="input-group-btn mb-2">
                        <a id="choose-img" data-input="image" data-preview="holder" class="btn btn-primary">
                            <i data-lucide="image" class="w-4 h-4 mr-1"></i> Chọn
                        </a>
                    </p>
                    <input id="image" name="{{$inputImageName ?? 'image'}}" type="text" class="form-control flex-1 h-fit readonly"
                           placeholder="Tải hình ảnh lên"
                           required value="{{ $selectedImage ?? '' }}"
                    >
                </div>
            </div>
            <div class="col-span-1">
                <div class="relative w-fit">
                    <div id="holder">
                        <div class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-48 h-28 overflow-hidden text-center">
                            @if(isset($selectedImage) && $selectedImage)
                                <img class="h-28 w-48" src="{{ asset($selectedImage) }}" alt="" />
                            @else
                                Chưa có hình ảnh xem trước
                            @endif
                        </div>
                    </div>
                    <button type="button" class="absolute border-red-600 border bg-white -right-4 -top-1 rounded-lg p-1 images-eraser text-red-700 hover:bg-red-600 hover:text-white" input-to-clear="image" holder-to-clear="holder" style="height: fit-content">
                        <i data-lucide="trash-2" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.stand_alone_lfm_js')
