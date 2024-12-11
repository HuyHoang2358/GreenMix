@extends('admin.layouts.adminApp')
@section('title', 'Thêm mới '.$type_name)
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.category.index', $type)}}">{{$type_name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Thêm mới</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <!-- Title page -->
    @include('admin.common.titleForm', ['titleForm' =>  'Thêm mới '. $type_name])

    <!-- Form create information -->
    <form action="{{route('admin.category.store', $type)}}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin danh mục
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên danh mục</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên danh mục ngắn gọn và không trùng lặp, và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="category-name" name="name" type="text" class="form-control" placeholder="Nhập tên danh mục" required autofocus>
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="category-name" max-characters="100">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Slug</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Hệ thống sẽ tự động tạo ra từ tên nếu không có giá trị</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="category-slug" name="slug" type="text" class="form-control" placeholder="Nhập slug của tên danh mục">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="category-slug" max-characters="100">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Danh mục cha</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="parent-category" name="parent_id" class="form-select">
                                <option value="0">Danh mục gốc</option>
                                @include('admin.content.category.option', ["categories" =>$categories, 'level' => 0, 'parent_id' => null])
                            </select>
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
                                    <div>Giải thích về danh mục để dễ hiểu cho người dùng</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="editor">
                                <textarea class="form-control" rows="3" id="category-description" name="description"></textarea>
                            </div>
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="category-description" max-characters="255">0</span>/255 ký tự</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{route('admin.category.index', $type)}}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>
@endsection
