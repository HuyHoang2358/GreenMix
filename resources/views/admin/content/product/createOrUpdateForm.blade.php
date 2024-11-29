@extends('admin.layouts.adminApp')
@section('title', 'Thêm mới thông tin sản phẩm')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Quản lý sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="#">{{ $isUpdate ? 'Cập nhật thông tin' : 'Thêm mới thông tin' }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')

    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <!-- Title page -->
    @include('admin.common.titleForm', [
        'titleForm' => $isUpdate ? 'Cập nhật thông tin sản phẩm' : 'Thêm mới thông tin sản phẩm',
    ])

    <!-- Form update information -->
    @php($actionRoute = $isUpdate ? route('admin.product.update', ['id' => $item->id]) : route('admin.product.store'))

    <form id="product-post" action="{{ $actionRoute }}" method="POST" class="required-form">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin sản phẩm
                </div>

                <div class="mt-5">
                    <!-- Tên sản phẩm -->
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên sản phẩm</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                        Bắt buộc
                                    </div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên sản phẩm không nên trùng lặp, ngắn gọn, dễ hiểu</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control"
                                placeholder="Nhập tên sản phẩm" required autofocus
                                value="{{ isset($item) ? $item->name : '' }}"
                            >
                            <div class="form-help text-right">Tối đa
                                <span class="word-counter" input-to-count="name" max-characters="255">0</span>/255 ký tự
                            </div>
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
                                placeholder="Nhập slug sản phẩm" autofocus value="{{ isset($item) ? $item->slug : '' }}">
                            <div class="form-help text-right">Tối đa
                                <span class="word-counter" input-to-count="slug"
                                    max-characters="100">0</span>/100 ký tự
                            </div>
                        </div>
                    </div>

                    <!-- Hình ảnh -->
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Hình ảnh</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Khuyến nghị</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Hình ảnh giúp người dùng dễ hình dung hơn về sản phẩm</div>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-2 flex-1">
                            <div class="flex-1">
                                <div class="w-full mt-3 xl:mt-0 flex-1 flex gap-2">
                                    <span class="input-group-btn">
                                        <a id="choose-img" data-input="image" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Chọn
                                        </a>
                                    </span>
                                    <input id="image" name="images" type="text"
                                        class="form-control flex-1 w-2 readonly input-json-decoder" placeholder="Tải hình ảnh lên" required
                                        autofocus value="{{ isset($item) ? $item->images : '' }}" />
                                </div>
                            </div>



                            <div class="flex items-center gap-2 relative w-fit">
                                <div id="holder" class="flex flex-row gap-2 items-center">
                                    @if (isset($item) && count($images) > 0)
                                        @foreach ($images as $image)
                                            <img class="h-28 w-48 rounded" src="{{ asset($image) }}" alt="">
                                        @endforeach
                                    @else
                                        <div
                                            class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-48 h-28 overflow-hidden text-center">
                                            Chưa có hình ảnh xem trước
                                        </div>
                                    @endif
                                </div>
                                <button type="button"
                                    class="absolute border-red-600 border bg-white -right-4 -top-1 rounded-lg p-1 images-eraser text-red-700 hover:bg-red-600 hover:text-white"
                                    input-to-clear="image" holder-to-clear="holder" style="height: fit-content;"><i
                                        data-lucide="trash-2" class="w-6 h-6"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Mô tả</div>
                                    <div
                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                        Bắt buộc
                                    </div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Cung cấp chi tiết về công việc cho người ứng tuyển
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea id="recruitment-description" name="description" class="form-control h-64 resize-none"
                                placeholder="Nhập mô tả" required autofocus>{{ isset($item) ? $item->description : '' }}</textarea>
                        </div>
                    </div>

                </div>

            </div>

            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                <div
                    class="font-medium text-base flex items-center justify-between border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Bài viết sản phẩm
                    <div>
                        <input class="mx-2" type="checkbox" id="togglePostFields" name="togglePostFields" checked/> Liên kết bài viết
                    </div>
                </div>
                <div id="postFields" class="hidden flex-col mt-5 required-form">
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
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.product.index')])

    </form>
    @include('admin.partials.stand_alone_lfm_js')
@endsection
