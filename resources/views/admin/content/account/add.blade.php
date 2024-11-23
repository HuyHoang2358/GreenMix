@extends('admin.layouts.adminApp')
@section('title', 'Thêm mới tài khoản')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.account.index')}}">Tài khoản</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.account.add')}}">Thêm mới</a></li>
        </ol>
    </nav>
@endsection
@section('content')

    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mới tài khoản
        </h2>
    </div>
    <form action="{{ route('admin.account.store') }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Thông tin tài khoản
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Họ và tên</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên tài khoản không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nhập họ và tên" required autofocus>
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="name" max-characters="100">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Email</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Email không được để trống, không được trùng với email đã có</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input required id="email" name="email" type="email" class="form-control" placeholder="Nhập email của tài khoản">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="email" max-characters="100">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Mật khẩu</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Nhập mật khẩu, tối thiểu 8 ký tự</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1 relative perfect-sight">
                            <input required id="password" name="password" type="password" class="form-control" placeholder="Nhập mật khẩu của tài khoản">
                            <i class="absolute toggle-password-on hidden" style="top: 19%; right: 1%; cursor: pointer;" data-lucide="eye"></i>
                            <i class="absolute toggle-password-off hidden" style="top: 19%; right: 1%; cursor: pointer;" data-lucide="eye-off"></i>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Nhập lại mật khẩu</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Nhập lại mật khẩu của bạn</div>
                            </div>
                        </div>
                        {{-- <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input required id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Xác nhận mật khẩu của tài khoản">
                        </div> --}}
                        <div class="w-full mt-3 xl:mt-0 flex-1 relative perfect-sight">
                            <input required id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Xác nhận mật khẩu của tài khoản">
                            <i class="absolute toggle-password-on hidden" style="top: 19%; right: 1%; cursor: pointer;" data-lucide="eye"></i>
                            <i class="absolute toggle-password-off hidden" style="top: 19%; right: 1%; cursor: pointer;" data-lucide="eye-off"></i>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{ route('admin.account.index') }}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
    </form>
@endsection
