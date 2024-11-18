@extends('admin.layouts.adminApp')
@section('title')
    Cài đặt ngôn ngữ
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.setting.language.index')}}">Cài đặt ngôn ngữ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.setting.language.add')}}">Thêm mới</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div>
        <h1 class="text-xl font-medium py-5">Thêm mới ngôn ngữ</h1>
    </div>
    <div class="bg-white rounded-lg px-10 py-5">
        <form action="{{ route('admin.setting.language.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-3 gap-12">
                <div class="col-span-2">
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
                            <input id="language-name" type="text" class="form-control" placeholder="Nhập tên ngôn ngữ" name="name" required>
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
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
                            <input id="language-slug" type="text" class="form-control" placeholder="Nhập slug" name="slug">
                            <div class="form-help text-right">Tối đa 0/100 kí tự</div>
                        </div>
                    </div>
                    <label for="image" class="form-label">Icon</label>
                    <div id="image" class="input-group flex gap-2">
                        <span class="input-group-btn pr-3" id="changeColorBtn">
                            <a id="post-img-preview" data-input="post-thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn
                            </a>
                        </span>
                        <input required="" readonly="" id="post-thumbnail" class="form-control" type="text" name="icon">
                    </div>
                </div>
                <div class="col-span-1">
                    <label for="holder" class="form-label">Hình ảnh xem trước</label>
                    <div class="bg-gray-300 w-96 h-44 rounded-lg" id="holder" style="margin-top:15px;">

                    </div>
                </div>
            </div>
            <div class="w-full text-end mt-10">
                <a href="{{route('admin.setting.language.index')}}"><button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Cancel</button></a>
                <button type="submit" class="btn py-3 btn-primary w-full md:w-52 ml-3">Save</button>
            </div>
        </form>
    </div>
    @include('admin.partials.stand_alone_lfm')

    <script>
        const button = document.getElementById('post-img-preview');
        const holder = document.getElementById('holder');

        // Thêm sự kiện click vào button
        button.addEventListener('click', () => {
            // Toggle class Tailwind để thay đổi màu nền
            holder.classList.remove('bg-gray-300');
        });
    </script>
@endsection
