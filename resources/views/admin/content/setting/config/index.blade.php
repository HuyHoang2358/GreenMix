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
                                    <input type="text" class="form-control" value="{{$config['top_hotline_1']}}" name="top_hotline_1" required>
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
                                    <input type="text" class="form-control" value="{{$config['top_hotline_2']}}" name="top_hotline_2" required>
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

                <!-- Ảnh Logo -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Hình ảnh Logo</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full  mt-3 xl:mt-0 flex-1 gap-2">
                        <div class="grid grid-cols-4 gap-2">
                            <div class="col-span-3">
                                <div class="w-full mt-3 xl:mt-0 flex-1 flex gap-2">
                                    <p class="input-group-btn mb-2">
                                        <a id="choose-img" data-input="logo" data-preview="holder" class="btn btn-primary">
                                            <i data-lucide="image" class="w-4 h-4 mr-1"></i> Chọn
                                        </a>
                                    </p>
                                    <input id="logo" name="logo" type="text" class="form-control flex-1 h-fit readonly"
                                           placeholder="Tải hình ảnh logo lên"
                                           required value="{{$config['logo']}}"
                                    >
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-fit">
                                    <div id="holder">
                                        <div class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-48 h-28 overflow-hidden text-center">
                                            @if(isset($config['logo']) && $config['logo'])
                                                <img class="h-28 w-48" src="{{ asset($config['logo']) }}" alt="" />
                                            @else
                                                Chưa có hình ảnh xem trước
                                            @endif
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
                <!-- End ảnh Logo -->


                <!-- Favicon -->
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Hình ảnh Favicon</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full  mt-3 xl:mt-0 flex-1 gap-2">
                        <div class="grid grid-cols-4 gap-2">
                            <div class="col-span-3">
                                <div class="w-full mt-3 xl:mt-0 flex-1 flex gap-2">
                                    <p class="input-group-btn mb-2">
                                        <a id="choose-img-secondary" data-input="favicon" data-preview="holder-2" class="btn btn-primary">
                                            <i data-lucide="image" class="w-4 h-4 mr-1"></i> Chọn
                                        </a>
                                    </p>
                                    <input id="favicon" name="favicon" type="text" class="form-control flex-1 h-fit readonly"
                                           placeholder="Tải hình ảnh favicon lên"
                                           required value="{{$config['favicon']}}"
                                    >
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-fit">
                                    <div id="holder-2">
                                        <div class="placeholder-text text-gray-600 flex items-center justify-center rounded bg-slate-300 w-48 h-28 overflow-hidden text-center">
                                            @if(isset($config['favicon']) && $config['favicon'])
                                                <img class="h-28 w-48" src="{{ asset($config['favicon']) }}" alt="" />
                                            @else
                                                Chưa có hình ảnh xem trước
                                            @endif
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
                <!-- End Favicon -->
            </div>
        </div>

        <!-- Buttons cancel and save -->
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.setting.config.index')])
    </form>

@include('admin.partials.stand_alone_lfm_js')
@endsection
