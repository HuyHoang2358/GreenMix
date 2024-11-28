@extends('admin.layouts.adminApp')
@section('title', 'Cấu hình hệ thống')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Cấu hình hệ thống</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    @include('admin.partials.validateFormError')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thông tin cấu hình hệ thống
        </h2>
    </div>
    <form action="{{route('admin.setting.config.store')}}" method="post">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin cấu hình
                </div>
                <div class="grid grid-cols-2">
                    <div class="col-span-1 mr-10">
                        <div class="my-5">
                            <div class="form-inline flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Tên Website</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['web_name']}}" name="web_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-inline flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Tên Công ty</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['company_name']}}" name="company_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-inline  flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Số Hotline 1</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['hotline_1']}}" name="hotline_1" required>
                                </div>
                            </div>
                        </div><div class="mb-5">
                            <div class="form-inline  flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Số Hotline 2</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['hotline_2']}}" name="hotline_2" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <div class="my-5">
                            <div class="form-inline flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Facebook</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['facebook_url']}}" name="facebook_url" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-inline flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Youtube</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['youtube_url']}}" name="youtube_url" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-inline flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Tiktok</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['tiktok_url']}}" name="tiktok_url" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-inline flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Email</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['email']}}" name="email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ảnh  -->
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
                                        <a id="choose-img" data-input="image" data-preview="holder" class="btn btn-primary">
                                            <i data-lucide="image" class="w-4 h-4 mr-1"></i> Chọn
                                        </a>
                                    </p>
                                    <input id="image" name="image" type="text" class="form-control flex-1 h-fit readonly"
                                           placeholder="Tải hình ảnh lên"
                                           required value=" {{$config['image']}}"
                                    >
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-fit">
                                    <div id="holder">
                                        <div class="placeholder-text text-gray-600 flex items-center justify-center rounded w-48 h-28 overflow-hidden text-center">
                                            <img class="h-28 w-48" src="{{$config['image']}}" alt="" />
                                        </div>
                                    </div>
                                    <button type="button" class="absolute border-red-600 border bg-white -right-4 -top-1 rounded-lg p-1 images-eraser text-red-700 hover:bg-red-600 hover:text-white" input-to-clear="image" holder-to-clear="holder" style="height: fit-content">
                                        <i data-lucide="trash-2" class="w-6 h-6"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{route('admin.setting.config.index')}}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>

    @include('admin.partials.stand_alone_lfm_js')
@endsection
