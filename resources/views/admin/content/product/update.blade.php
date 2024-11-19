@extends('admin.layouts.adminApp')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Thêm mới</a></li>
        </ol>
    </nav>
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2 fixed right-60"
            style="z-index: 9999; top: 6.75rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật sản phẩm
        </h2>
    </div>
    <form id="product-post" action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div
                    class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Thông tin sản phẩm
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên sản phẩm</div>
                                    <div
                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                        Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên sản phẩm không được để trống
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control"
                                placeholder="Nhập tên sản phẩm" required autofocus
                                value="{{ $product->name }}">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="name" max-characters="255">0</span>/255 ký tự
                            </div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Slug</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Slug sẽ tự tạo nếu không nhập giá
                                    trị</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="slug" name="slug" type="text" class="form-control"
                                placeholder="Nhập slug sản phẩm" autofocus
                                value="{{ $product->slug }}">
                            <div class="form-help text-right">Tối đa <span id="number-character-slug" class="word-counter" input-to-count="slug" max-characters="100">0</span>/100 ký tự
                            </div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Hình ảnh</div>
                                    <div
                                        class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                        Khuyến nghị</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Hình ảnh sẽ giúp bài đăng của bạn
                                    ấn tượng hơn</div>
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-2">
                            <div class="flex-1">
                                <div class="w-full mt-3 xl:mt-0 flex-1 flex gap-2">
                                    <span class="input-group-btn">
                                        <a id="post-img-preview" data-input="image" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Chọn
                                        </a>
                                    </span>
                                    <input id="image" readonly name="images" type="text"
                                        class="form-control flex-1 w-2" placeholder="Tải hình ảnh lên" required autofocus
                                        value="{{ $product->images }}" />
                                </div>
                            </div>

                            <div>
                                <div>
                                    <div id="holder"
                                        class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-40 h-20 overflow-hidden text-center">
                                        @if ($product->images)
                                            <img class="h-20 w-40" src="{{ asset($product->images) }}" alt="">
                                        @else
                                            Chưa có hình ảnh xem trước
                                        @endif
                                    </div>
                                </div>
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
                                        Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Cung cấp chi tiết về công việc cho
                                    người ứng tuyển</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea id="recruitment-description" name="description" class="form-control h-64 resize-none" placeholder="Nhập mô tả"
                                required autofocus>{{ $product->description }}</textarea>
                        </div>
                    </div>

                </div>

            </div>

            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                <div
                    class="font-medium text-base flex items-center justify-between border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Bài viết sản phẩm
                    <div>
                        <input class="mx-2" type="checkbox" id="togglePostFields" name="togglePostFields"
                            @if ($product->post_id) checked @endif /> Liên kết
                        bài viết
                    </div>
                </div>
                <div id="postFields" class="hidden flex-col mt-5 required-form">
                    {{-- BEGIN --}}
                    <div class="intro-y box">
                        <div id="input" class="p-5 grid grid-cols-2 gap-5">
                            <div class="preview flex flex-col gap-2">
                                <div>
                                    <label for="type" class="form-label">Loại bài viết<span style="color: red;">
                                            *</span></label>
                                    <input readonly required id="type" name="type" type="text"
                                        class="form-control" value="Sản phẩm">
                                </div>
                                <div>
                                    <label for="add-post-image" class="form-label">Hình ảnh<span style="color: red;">
                                            *</span></label>
                                    <div id="add-post-image" class="input-group flex gap-2">
                                        <span class="input-group-btn">
                                            <a id="add-post-img-preview" data-input="add-post-thumbnail"
                                                data-preview="add-post-holder" class="btn btn-primary flex gap-1">
                                                <i data-lucide="image"></i> Chọn
                                            </a>
                                        </span>
                                        <input readonly id="add-post-thumbnail" class="form-control" type="text"
                                            name="post-thumbnail"
                                            value="{{ $product->post ? $product->post->images : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="holder" class="form-label">Hình ảnh xem trước</label>
                                <div style="margin-top:15px;">
                                    <div id="add-post-holder"
                                        class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-40 h-20 overflow-hidden text-center">
                                        @if ($product->post && $product->post->images)
                                            <img class="h-20 w-40" src="{{ asset($product->post->images) }}"
                                                alt="">
                                        @else
                                            Chưa có hình ảnh xem trước
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- SECTION 2 --}}
                    <div class="mt-5 grid grid-cols-2 gap-5">
                        <div class="intro-y box">
                            <div class="p-5 flex flex-col gap-2">
                                <div>
                                    <label for="name" class="form-label">Tên bài viết<span style="color: red;">
                                            *</span></label>
                                    <input id="post-name" name="post-name" type="text" class="form-control"
                                        placeholder="Nhập tên" value="{{ $product->post ? $product->post->name : '' }}">
                                </div>
                                <div>
                                    <label for="title" class="form-label">Tiêu đề bài viết <span style="color: red;">
                                            *</span></label>
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="Nhập tiêu đề"
                                        value="{{ $product->post ? $product->post->title : '' }}">
                                </div>
                                <div>
                                    <label for="slug" class="form-label">Slug bài viết<span style="color: red;">
                                            *</span></label>
                                    <input id="post-slug" name="post-slug" type="text" class="form-control"
                                        placeholder="Nhập slug" value="{{ $product->post ? $product->post->slug : '' }}">
                                </div>
                                <div>
                                    <label for="description" class="form-label">Mô tả<span style="color: red;">
                                            *</span></label>
                                    <textarea id="post-description" class="form-control h-20" name="post-description" placeholder="Nhập mô tả"
                                        style="resize: none;">{{ $product->post ? $product->post->description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y box">
                            <div class="p-5 flex flex-col gap-2">
                                <div>
                                    <label for="seo-title" class="form-label">Tiêu đề SEO</label>
                                    <input id="seo-title" name="seo-title" type="text" class="form-control"
                                        placeholder="Nhập tiêu đề seo"
                                        value="{{ $product->post ? $product->post->seo_title : '' }}">
                                </div>
                                <div>
                                    <label for="seo-keyword" class="form-label">Từ khóa SEO</label>
                                    <input id="seo-keyword" name="seo-keyword" type="text" class="form-control"
                                        placeholder="Nhập slug"
                                        value="{{ $product->post ? $product->post->seo_keyword : '' }}">
                                </div>
                                <div>
                                    <label for="seo-description" class="form-label">Mô tả SEO</label>
                                    <textarea id="seo-description" class="form-control h-40" name="seo-description" placeholder="Nhập mô tả"
                                        style="resize: none;">{{ $product->post ? $product->post->seo_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END --}}
                    {{-- SECTION 3 --}}
                    <div class="mt-5">
                        <div class="intro-y box">
                            <div class="p-5 flex flex-col gap-2">
                                <div>
                                    <label for="content" class="form-label">Nội dung bài viết<span style="color: red;">
                                            *</span></label>
                                    <textarea id="content" name="content" placeholder="Nhập nội dung" class="h-96 form-control">{{ $product->post ? $product->post->content : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END --}}
                </div>
            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{ route('admin.product.index') }}">
                <button type="button"
                    class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>

    @include('admin.partials.stand_alone_lfm')

@endsection
