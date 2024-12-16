@extends('admin.layouts.adminApp')
@section('title', $isUpdate ? 'Cập nhật thông tin dự án' : 'Thêm mới thông tin dự án')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.project.index')}}">Quản lý dự án hợp tác</a></li>
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
    @include('admin.common.titleForm', ['titleForm' =>  $isUpdate ? 'Cập nhật thông tin dự án' : 'Thêm mới thông tin dự án'])

    <!-- Form update information -->
    @php($actionRoute = $isUpdate ? route('admin.project.update', ['id' => $item->id]) : route('admin.project.store'))
    <form action="{{ $actionRoute }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin dự án
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên dự án</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên dự án nên viết ngắn gọn</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nhập tên tên dự án" required value="{{ isset($item) ? $item->name : ''}}">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="name" max-characters="100">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <!-- Slug -->
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Slug</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                        Không bắt buộc
                                    </div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Slug sẽ tự tạo nếu không nhập giá trị</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="slug" name="slug" type="text" class="form-control"
                                   placeholder="Nhập slug dự án" autofocus value="{{ isset($item) ? $item->slug : '' }}">
                            <div class="form-help text-right">Tối đa
                                <span class="word-counter" input-to-count="slug"
                                      max-characters="100">0</span>/100 ký tự
                            </div>
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
                            <input id="project-order" type="number" class="form-control" placeholder="Nhập số thứ tự hiển thị của dự án"
                                   name="order" required value="{{$item ?  $item -> order : ''}}">
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Địa chỉ</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Địa chỉ dự án không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="address" name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" required value="{{ isset($item) ? $item->address : ''}}">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="address" max-characters="200">0</span>/200 ký tự</div>
                        </div>
                    </div>

                    <!-- Ảnh  -->
                    @include('admin.partials.stand_alone_lfm', ["inputImageName" => 'images', "selectedImage" => isset($item) ? $item->images : null])

                </div>
            </div>
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                <div
                    class="font-medium text-base flex items-center justify-between border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Bài viết sản phẩm
                </div>
                <div id="postFields" class="flex-col mt-5 required-form">
                    {{-- BEGIN --}}
                    <div class="mt-5 grid grid-cols-2 gap-5">
                        <div class="intro-y box">
                            <div class="p-5 flex flex-col gap-2">
                                <div>
                                    <label for="seo-title" class="form-label">Tiêu đề SEO</label>
                                    <input id="seo-title" name="seo-title" type="text" class="form-control"
                                           placeholder="Nhập tiêu đề seo"
                                           value="{{ isset($item->post) ? $item->post->seo_title : '' }}">
                                </div>
                                <div>
                                    <label for="seo-keyword" class="form-label">Từ khóa SEO</label>
                                    <input id="seo-keyword" name="seo-keyword" type="text" class="form-control"
                                           placeholder="Nhập slug"
                                           value="{{ isset($item->post) ? $item->post->seo_keyword : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="intro-y box">
                            <div class="p-5 flex flex-col gap-2">
                                <div>
                                    <label for="seo-description" class="form-label">Mô tả SEO</label>
                                    <textarea id="seo-description" class="form-control h-40" name="seo-description" placeholder="Nhập mô tả"
                                              style="resize: none;">{{ isset($item->post) ? $item->post->seo_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END --}}
                    {{-- SECTION 2 --}}
                    <div class="mt-5">
                        <div class="intro-y box">
                            <div class="p-5 flex flex-col gap-2">
                                <div>
                                    <label for="content" class="form-label">Nội dung bài viết<span style="color: red;">
                                            *</span></label>
                                    <textarea required="required" id="content" name="content" placeholder="Nhập nội dung" class="h-96 form-control">{{ isset($item->post) ? $item->post->content : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END --}}
                </div>
            </div>
        </div>

        <!-- Buttons cancel and save -->
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.project.index')])
    </form>
@endsection
