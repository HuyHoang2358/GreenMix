@extends('admin.layouts.adminApp')
@section('title', 'Chỉnh sửa ngôn ngữ')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.setting.language.index')}}">Cài đặt ngôn ngữ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Chỉnh sửa thông tin</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    @include('admin.partials.validateFormError')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-xl font-medium mr-auto mb-10">
            Chỉnh sửa ngôn ngữ {{$languague->name}}
        </h2>
    </div>
    <form action="{{route('admin.setting.language.update', $languague->id)}}" method="post">
        @csrf
        <div class="grid grid-cols-4 gap-12 bg-white p-10 rounded-xl">
            <div class="col-span-3">
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
                        <input id="product-name" type="text" class="form-control" value="{{$languague->name}}" name="name" required>
                        <div class="form-help text-right">Tối đa 0/100 Ký tự</div>
                    </div>
                </div>
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pb-3 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Slug</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc </div>
                            </div>
                            <div class="leading-relaxed text-slate-500 text-xs mt-3">Hệ thống sẽ tự động tạo ra từ tên nếu không có giá trị</div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="product-name" type="text" class="form-control" value="{{$languague->slug}}" name="slug">
                        <div class="form-help text-right">Tối đa 0/100 Ký tự</div>
                    </div>
                </div>
                <label for="image" class="form-label">Icon</label>
                <div id="image" class="input-group flex gap-2">
                    <span class="input-group-btn pr-3">
                        <a id="post-img-preview" data-input="post-thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Chọn
                        </a>
                    </span>
                    <input required="" readonly="" id="post-thumbnail" class="form-control" type="text" name="icon" value="{{$languague->icon}}">
                </div>
            </div>
            <div class="col-span-1">
                <label for="holder" class="form-label">Hình ảnh xem trước</label>
                <div id="holder" style="margin-top:15px;">
                    @if($languague->icon)
                        <img class="w-16 h-16" src="{{ $languague->icon }}" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full text-end mt-10">
            <a href="{{route('admin.setting.language.index')}}"><button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button></a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52 ml-3">Lưu thông tin</button>
        </div>
    </form>
    @include('admin.partials.stand_alone_lfm')
@endsection
