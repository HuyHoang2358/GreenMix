@extends('admin.layouts.adminApp')
@section('title', $isUpdate ? 'Cập nhật ngôn ngữ' : 'Thêm mới ngôn ngữ')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.setting.language.index')}}">Ngôn ngữ hợp tác</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="#"> {{ $isUpdate ? 'Cập nhật thông tin ngôn ngữ' : 'Thêm mới thông tin ngôn ngữ' }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <!-- Title page -->
    @include('admin.common.titleForm', ['titleForm' =>  $isUpdate ? 'Cập nhật thông tin ngôn ngữ' : 'Thêm mới thông tin ngôn ngữ'])

    <!-- Form update information -->
    @php($actionRoute = $isUpdate ? route('admin.setting.language.update', ['id' => $item->id]) : route('admin.setting.language.store'))
    <form action="{{ $actionRoute }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin ngôn ngữ
                </div>

                <div class="col-span-2 pt-3">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên Ngôn Ngữ</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Yêu cầu tên đúng định dạng, không trùng lặp và ngắn gọn</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="language-name" type="text"
                                   class="form-control" placeholder="Nhập tên ngôn ngữ" name="name" required
                                   onkeyup="handleCountNumberCharacter('language-name', 'number-character-language-name', 100)"
                                   value="{{$item ? $item->name : ''}}"
                            >
                            <div class="form-help text-right">Tối đa <span id="number-character-language-name">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pb-3 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Slug</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc </div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Hệ thống sẽ tự động tạo ra từ tên nếu không có giá trị</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="language-slug" type="text" class="form-control" placeholder="Nhập slug" name="slug"
                                   onkeyup="handleCountNumberCharacter('language-slug', 'number-character-language-slug', 100)"
                                   value="{{$item ? $item->slug : ''}}"
                            >
                            <div class="form-help text-right">Tối đa <span id="number-character-language-slug">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <!-- Ảnh  -->
                    @include('admin.partials.stand_alone_lfm', ["inputImageName" => 'icon', "selectedImage" => isset($item) ? $item->icon : null])
                </div>
            </div>
        </div>

        <!-- Buttons cancel and save -->
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.setting.language.index')])
    </form>
@endsection
