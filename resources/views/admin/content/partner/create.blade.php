@extends('admin.layouts.adminApp')
@section('title')
    Thêm mới đối tác
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.partner.index')}}">Quản lý đối tác</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.partner.add')}}">Thêm mới</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mới đối tác
        </h2>
    </div>
    <form action="{{route('admin.partner.store')}}" method="post">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin đối tác
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên đối tác</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên đối tác ngắn gọn, không trùng lặp và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="partner-name" type="text" class="form-control" placeholder="Nhập tên đối tác" onkeyup="handleCountNumberCharacter('partner-name', 'number-character-partner-name', 255)" name="name" required autofocus>
                            <div class="form-help text-right">Tối đa <span id="number-character-partner-name">0</span>/255 ký tự</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 mt-5 gap-16">
                        <div class="w-full mt-3 xl:mt-0 gap-10 col-span-3">
                            <div class="text-left pb-4">
                                <div class="flex items-center">
                                    <div class="font-medium">Đường dẫn ảnh Logo</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                            </div>
                            <div>
                                <div id="image" class="input-group flex gap-2">
                                <span class="input-group-btn pr-3">
                                    <a id="post-img-preview" data-input="partner-logo" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn
                                    </a>
                                </span>
                                    <input id="partner-logo" readonly="" type="text" class="form-control" name="logo" required>
                                </div>
                            </div>
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">URL</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">URL đúng định dạng</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="partner-url" type="text" class="form-control" placeholder="Nhập URL của đối tác" onkeyup="handleCountNumberCharacter('partner-url', 'number-character-partner-url', 200)" name="url">
                                    <div class="form-help text-right">Tối đa <span id="number-character-partner-url">0</span>/200 ký tự</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="holder" class="form-label">Hình ảnh xem trước</label>
                            <div id="holder" style="margin-top:15px"></div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Số thứ tự hiển thị</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Số thứ tự hiển thị không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="partner-order" type="number" class="form-control" placeholder="Nhập số thứ tự hiển thị của đối tác" name="order" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{route('admin.partner.index')}}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>
    @include('admin.partials.stand_alone_lfm')
@endsection
