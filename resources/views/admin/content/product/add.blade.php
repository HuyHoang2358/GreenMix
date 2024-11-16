@extends('admin.layouts.adminApp')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Thêm mới</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2 fixed right-60" style="z-index: 9999; top: 6.75rem;">
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
            Thêm mới sản phẩm
        </h2>
    </div>
    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Thông tin sản phẩm
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên sản phẩm</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên sản phẩm không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nhập tên tên dự án" required autofocus>
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Slug</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Slug sẽ tự tạo nếu không nhập giá trị</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="slug" name="slug" type="text" class="form-control" placeholder="Nhập slug sản phẩm" required autofocus>
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Hình ảnh</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Khuyến nghị</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Hình ảnh sẽ giúp bài đăng của bạn ấn tượng hơn</div>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <div class="w-full mt-3 xl:mt-0 flex-1 flex gap-2">
                                <span class="input-group-btn">
                                    <a id="post-img-preview" data-input="image" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn
                                    </a>
                                </span>
                                <input id="image" readonly name="images" type="text" class="form-control flex-1 w-2" placeholder="Tải hình ảnh lên" required autofocus>
                            </div>
                            <div>
                                <label for="holder" class="form-label">Hình ảnh xem trước</label>
                                <div id="holder" style="margin-top:15px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Bài viết</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Liên kết sản phẩm của bạn với bài viết</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="post_id" name="post_id" class="form-control">
                                <option value="">Không có bài viết nào</option>
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}">Tên: {{ $post->name }} - Tiêu đề: {{ $post->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Mô tả</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Cung cấp chi tiết về công việc cho người ứng tuyển</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea id="recruitment-description" name="description" class="form-control" placeholder="Nhập mô tả" required autofocus>
                            </textarea>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{ route('admin.product.index') }}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>

    @include('admin.partials.stand_alone_lfm')

@endsection
