@extends('admin.layouts.adminApp')
@section('title', $isUpdate ? 'Cập nhật banner' : 'Thêm mới banner')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.setting.banner.index')}}">Đối tác hợp tác</a></li>
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
    @include('admin.common.titleForm', ['titleForm' =>  $isUpdate ? 'Cập nhật thông tin Banner' : 'Thêm mới thông tin Banner'])

    <!-- Form update information -->
    @php($actionRoute = $isUpdate ? route('admin.setting.banner.update', ['id' => $item->id]) : route('admin.setting.banner.store'))
    <form action="{{ $actionRoute }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin Banner
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên Banner</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên đối tác ngắn gọn không trùng lặp và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="banner-name" type="text" class="form-control" placeholder="Nhập tên banner"
                                   onkeyup="handleCountNumberCharacter('banner-name', 'number-character-banner-name', 255)"
                                   name="name" required autofocus value="{{$item ?  $item->name : ''}}">
                            <div class="form-help text-right">Tối đa <span id="number-character-banner-name">0</span>/255 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tiêu đề</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Tiêu đề ngắn gọn và không trùng lặp, không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="banner-title" type="text" class="form-control" placeholder="Nhập tiêu đề của banner"
                                   onkeyup="handleCountNumberCharacter('banner-title', 'number-character-banner-title', 200)"
                                   name="title" required value="{{$item ?  $item->title : ''}}">
                            <div class="form-help text-right">Tối đa <span id="number-character-banner-title">0</span>/200 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Mô tả</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    <div>Giải thích về banner để dễ hiểu cho người dùng</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="editor">
                                <textarea id="banner-description" class="form-control" rows="3"
                                          onkeyup="handleCountNumberCharacter('banner-description', 'number-character-banner-description', 255)"
                                          name="description" >{{$item ?  $item-> description : ''}}</textarea>
                            </div>
                            <div class="form-help text-right">Tối đa <span id="number-character-banner-description">0</span>/255 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Đường dẫn đính kèm</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Đường dẫn không trùng lặp và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="banner-attach-link" type="text" class="form-control" placeholder="Nhập đường dẫn đính kèm của banner"
                                   onkeyup="handleCountNumberCharacter('banner-attach-link', 'number-character-banner-attach-link', 255)"
                                   name="attach_link" required value="{{$item ?  $item->attach_link : ''}}">
                            <div class="form-help text-right">Tối đa <span id="number-character-banner-attach-link">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <!-- Ảnh  -->
                    @include('admin.partials.stand_alone_lfm', ["inputImageName" => 'path', "selectedImage" => isset($item) ? $item->path : null])

                    </div>
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Trạng thái hiển thị</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <select id="banner-is-show" class="form-select" name="is_show" required>
                                    <option value="1">Có hiển thị </option>
                                    <option value="0">Không hiển thị</option>
                                </select>
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
                            <input id="banner-order" type="number" class="form-control" placeholder="Nhập số thứ tự hiển thị của banner"
                                   name="order" required value="{{$item ?  $item->order : ''}}">
                        </div>
                    </div>
                </div>
            </div>

        <!-- Buttons cancel and save -->
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.setting.banner.index')])
    </form>
@endsection
