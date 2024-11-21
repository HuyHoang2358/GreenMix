@extends('admin.layouts.adminApp')
@section('title', 'Cập nhật dự án')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.project.index')}}">Dự án hợp tác</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Cập nhật</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <!-- Title page -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật dự án
        </h2>
    </div>

    <!-- Form update information -->
    <form action="{{ route('admin.project.update', ['id' => $project->id]) }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-5">
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
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên dự án không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nhập tên tên dự án" required value="{{ $project->name }}">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="name" max-characters="100">0</span>/100 ký tự</div>
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
                            <input id="address" name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" required value="{{ $project->address }}">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="address" max-characters="200">0</span>/200 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Hình ảnh</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Hình ảnh sẽ giúp bài đăng của bạn ấn tượng hơn</div>
                            </div>
                        </div>
                        <div class="w-full  mt-3 xl:mt-0 flex-1 gap-2">
                            <div class="grid grid-cols-4 gap-2">
                                <div class="col-span-3">
                                    <div class="w-full mt-3 xl:mt-0 flex-1 flex gap-2">
                                        <p class="input-group-btn mb-2">
                                            <a id="post-img-preview" data-input="image" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Chọn
                                            </a>
                                        </p>
                                        <input id="image" name="image" type="text" class="form-control flex-1 h-fit readonly" placeholder="Tải hình ảnh lên" required  value="{{ $project->image }}">
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <div class="relative">
                                        <div>
                                            <div id="holder" class="placeholder-text text-gray-600 p-2 flex items-center justify-center rounded bg-slate-300 w-full h-24 overflow-hidden text-center">
                                                @if($project->image)
                                                    <img class="h-20 w-40" src="{{ asset($project->image) }}" alt="">
                                                @else
                                                    Chưa có hình ảnh xem trước
                                                @endif
                                            </div>
                                        </div>
                                        <button type="button" class="rounded-lg p-1 images-eraser absolute top-0 right-0 mt-[-15px] mr-[-15px] text-red-700 hover:bg-red-600 hover:text-white" input-to-clear="image" holder-to-clear="holder" style="height: fit-content">
                                            <i data-lucide="trash-2" class="w-6 h-6"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buttons cancel and save -->
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{ route('admin.project.index') }}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>

    <!-- JS code for handle import a image -->
    @include('admin.partials.stand_alone_lfm')
@endsection
