@extends('admin.layouts.adminApp')
@section('title')
    Cập nhật bài viết
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.post.index', ['type' => $type])}}">Bài viết</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">
                Cập nhật</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')

    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật bài viết
        </h2>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y col-span-12 lg:col-span-12 mt-2">
        <form method="POST" action="{{ route('admin.post.update', ['type' => $type, 'id' => $post->id]) }}" class="overflow-x-auto flex flex-col mt-2 required-form">
            @csrf
            {{-- BEGIN --}}
            <div class="intro-y box">
                <div id="input" class="p-5 grid grid-cols-2 gap-5">
                    <div class="preview flex flex-col gap-2">
                        <div>
                            <label for="type" class="form-label">Loại bài viết<span style="color: red;"> *</span></label>
                            <select required id="type" name="type" type="text" class="form-control">
                                <option value="news" {{ $type == 'news' ? 'selected' : '' }}>Tin tức</option>
                                <option value="knowledge" {{ $type == 'knowledge' ? 'selected' : '' }}>Kiến thức</option>
                                <option value="recruitment" {{ $type == 'recruitment' ? 'selected' : '' }}>Tuyển dụng</option>
                            </select>
                        </div>
                        <div>
                            <label for="image" class="form-label">Hình ảnh<span style="color: red;"> *</span></label>
                            <div id="image" class="input-group flex gap-2">
                                <span class="input-group-btn">
                                    <a id="post-img-preview" data-input="post-thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn
                                    </a>
                                </span>
                                <input id="post-thumbnail" class="form-control readonly" type="text" name="post-thumbnail" value="{{ $post->images }}" placeholder="Thêm hình ảnh cho bài viết">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="holder">Hình ảnh xem trước</label>
                        <div style="margin-top:15px;" class="relative flex flex-row gap-2 items-center w-fit">
                            <div id="holder" class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-48 h-28 overflow-hidden">
                                @if($post->images)
                                    <img class="h-28 w-48" src="{{ asset($post->images) }}" alt="">
                                @else
                                    Chưa có hình ảnh nào
                                @endif
                            </div>
                            <button type="button" class="absolute border-red-600 border bg-white -right-4 -top-1 rounded-lg p-1 images-eraser text-red-700 hover:bg-red-600 hover:text-white" input-to-clear="post-thumbnail" holder-to-clear="holder" style="height: fit-content;"><i data-lucide="trash-2" class="w-6 h-6"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- SECTION 2 --}}
            <div class="mt-5 grid grid-cols-2 gap-5">
                <div class="intro-y box">
                    <div class="p-5 flex flex-col gap-2">
                        <div>
                            <label for="name" class="form-label">Tên bài viết<span style="color: red;"> *</span></label>
                            <input required id="name" name="name" type="text" class="form-control" placeholder="Nhập tên" value="{{ $post->name }}">
                        </div>
                        <div>
                            <label for="title" class="form-label">Tiêu đề bài viết<span style="color: red;"> *</span></label>
                            <input required id="title" name="title" type="text" class="form-control" placeholder="Nhập tiêu đề" value="{{ $post->title }}">
                        </div>
                        <div>
                            <label for="slug" class="form-label">Slug bài viết</label>
                            <input id="slug" name="slug" type="text" class="form-control" placeholder="Nhập slug" value="{{ $post->slug }}">
                        </div>
                        <div>
                            <label for="description" class="form-label">Mô tả<span style="color: red;"> *</span> </label>
                            <textarea required id="post-description" class="form-control h-20" name="post-description" placeholder="Nhập mô tả" style="resize: none;">{{ $post->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="intro-y box">
                    <div class="p-5 flex flex-col gap-2">
                        <div>
                            <label for="seo-title" class="form-label">Tiêu đề SEO</label>
                            <input id="seo-title" name="seo-title" type="text" class="form-control" placeholder="Nhập tiêu đề seo" value="{{ $post->seo_title }}">
                        </div>
                        <div>
                            <label for="seo-keyword" class="form-label">Từ khóa SEO</label>
                            <input id="seo-keyword" name="seo-keyword" type="text" class="form-control" placeholder="Nhập từ khóa SEO" value="{{ $post->seo_keyword }}">
                        </div>
                        <div>
                            <label for="seo-description" class="form-label">Mô tả SEO</label>
                            <textarea id="seo-description" class="form-control h-40" name="seo-description" placeholder="Nhập mô tả" style="resize: none;"> {{ $post->seo_description }}</textarea>
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
                            <label for="content" class="form-label">Nội dung bài viết<span style="color: red;"> *</span></label>
                            <textarea required id="content" name="content" placeholder="Nhập nội dung" class="h-96">
                                {{ $post->content }}
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