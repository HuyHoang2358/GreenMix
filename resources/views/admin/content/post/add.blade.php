@extends('admin.layouts.adminApp')
@section('title')
    Thêm mới bài viết
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.category.index', $type) }}">
                Thêm mới bài viết {{ $type == 'news' ? 'tin tức' : ($type == 'knowledge' ? 'kiến thức' : 'tuyển dụng') }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mới {{ $type == 'news' ? 'bài viết tin tức' : ($type == 'knowledge' ? 'bài viết kiến thức' : 'bài viết tuyển dụng') }}
        </h2>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y col-span-12 lg:col-span-12 mt-2">
        <form method="POST" action="{{ route('admin.post.store', $type) }}" class="overflow-x-auto flex flex-col mt-2">
            @csrf
            {{-- BEGIN --}}
            <div class="intro-y box">
                <div id="input" class="p-5 grid grid-cols-2 gap-5">
                    <div class="preview flex flex-col gap-2">
                        <div>
                            <label for="title" class="form-label">Loại bài viết</label>
                            <input readonly required id="title" name="title" type="text" class="form-control" value="{{ $type == 'news' ? 'Tin tức' : ($type == 'knowledge' ? 'Kiến thức' : 'Tuyển dụng') }}">
                        </div>
                        <div>
                            <label for="image" class="form-label">Hình ảnh</label>
                            <div id="image" class="input-group flex gap-2">
                                <span class="input-group-btn">
                                    <a id="post-img-preview" data-input="post-thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn
                                    </a>
                                </span>
                                <input required readonly id="post-thumbnail" class="form-control" type="text" name="post-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="holder" class="form-label">Hình ảnh xem trước</label>
                        <div id="holder" style="margin-top:15px;"></div>
                    </div>
                </div>
            </div>
            {{-- SECTION 2 --}}
            <div class="mt-5 grid grid-cols-2 gap-5">
                <div class="intro-y box">
                    <div class="p-5 flex flex-col gap-2">
                        <div>
                            <label for="name" class="form-label">Tên bài viết</label>
                            <input required id="name" name="name" type="text" class="form-control" placeholder="Nhập tên">
                        </div>
                        <div>
                            <label for="title" class="form-label">Tiêu đề bài viết</label>
                            <input required id="title" name="title" type="text" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        <div>
                            <label for="slug" class="form-label">Slug bài viết</label>
                            <input required required id="slug" name="slug" type="text" class="form-control" placeholder="Nhập slug">
                        </div>
                        <div>
                            <label for="description" class="form-label">Mô tả </label>
                            <textarea required id="post-description" name="post-description" placeholder="Nhập mô tả">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="intro-y box">
                    <div class="p-5 flex flex-col gap-2">
                        <div>
                            <label for="seo-title" class="form-label">Tiêu đề SEO</label>
                            <input required id="seo-title" name="seo-title" type="text" class="form-control" placeholder="Nhập tiêu đề seo">
                        </div>
                        <div>
                            <label for="seo-keyword" class="form-label">Từ khóa SEO</label>
                            <input required id="seo-keyword" name="seo-keyword" type="text" class="form-control" placeholder="Nhập slug">
                        </div>
                        <div>
                            <label for="seo-description" class="form-label">Mô tả SEO</label>
                            <textarea required id="seo-description" name="seo-description" placeholder="Nhập mô tả">
                            </textarea>
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
                            <label for="content" class="form-label">Nội dung bài viết</label>
                            <textarea required id="content" name="content" placeholder="Nhập nội dung" class="h-96">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END --}}
            {{-- BUTTON SECTION --}}
            <div class="mt-5">
                <div class="intro-y box">
                    <div class="p-3 flex justify-end">
                        <a href="{{ route('admin.post.index', $type) }}" onclick="return confirm('Bạn có chắc muốn hủy ? Mọi thay đổi sẽ không được lưu');"><button type="button" class="btn btn-secondary w-24 mr-1">Hủy</button></a>
                        <button type="submit" class="btn btn-primary w-24 mr-1">Lưu</button>
                    </div>
                </div>
            </div>
            {{-- END --}}
        </form>
    </div>
    @include('admin.partials.stand_alone_lfm')
@endsection
