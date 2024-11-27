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
                        <div class="mb-5">
                            <div class="form-inline flex-col items-center xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label">
                                    <div class="text-left w-24">
                                        <div class="font-medium">Logo <span class="text-red-500"> --- Sửa thành button chọn ảnh từ filemanager</span></div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input type="text" class="form-control" value="{{$config['logo']}}" name="logo" required>
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
            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{route('admin.setting.config.index')}}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>
@endsection
