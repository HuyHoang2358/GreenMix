@extends('admin.layouts.adminApp')
@section('title', $isUpdate ? 'Cập nhật đối tác' : 'Thêm mới đối tác')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.partner.index')}}">Đối tác hợp tác</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="#"> {{ $isUpdate ? 'Cập nhật thông tin' : 'Thêm mới thông tin' }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <!-- Title page -->
    @include('admin.common.titleForm', ['titleForm' =>  $isUpdate ? 'Cập nhật thông tin đối tác' : 'Thêm mới thông tin đối tác'])

    <!-- Form update information -->
    @php($actionRoute = $isUpdate ? route('admin.partner.update', ['id' => $item->id]) : route('admin.partner.store'))
    <form action="{{ $actionRoute }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin đối tác
                </div>

                <div class="mt-5">
                    <!-- Tên  đối tac -->
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
                            <input id="partner-name" type="text" class="form-control" placeholder="Nhập tên đối tác"
                                   onkeyup="handleCountNumberCharacter('partner-name', 'number-character-partner-name', 255)"
                                   name="name" required autofocus
                                   value="{{$item ?  $item->name : ''}}"
                            >
                            <div class="form-help text-right">Tối đa <span id="number-character-partner-name">0</span>/255 ký tự</div>
                        </div>
                    </div>

                    <!-- Số thứ tự hiển thị -->
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
                            <input id="partner-order" type="number" class="form-control"
                                   placeholder="Nhập số thứ tự hiển thị của đối tác" name="order" required
                                   value="{{$item ? $item->order : ''}}"
                            >
                        </div>
                    </div>

                    <!-- Ảnh  -->
                    @include('admin.partials.stand_alone_lfm', ["inputImageName" => 'logo', "selectedImage" => isset($item) ? $item->logo : null])
                </div>
            </div>
        </div>

        <!-- Buttons cancel and save -->
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.partner.index')])
    </form>
@endsection
