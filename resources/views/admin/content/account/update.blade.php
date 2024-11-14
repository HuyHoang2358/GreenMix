@extends('admin.layouts.adminApp')
@section('title')
    Chỉnh sửa tài khoản
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.account.index')}}">Tài khoản</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.account.add')}}">Chỉnh sửa</a></li>
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
            Chỉnh sửa tài khoản
        </h2>
    </div>
    <form action="{{ route('admin.account.update', ['id' => $account->id]) }}" method="POST">
        @csrf
        @method('PATCH')
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
                                    <div class="font-medium">Tên tài khoản</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên tài khoản không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nhập tên danh mục" required autofocus value="{{ $account->name }}">
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Email</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Email không được để trống, không được trùng với email đã có</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input required id="email" name="email" type="email" class="form-control" placeholder="Nhập email của tài khoản" value="{{ $account->email }}">
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Email xác thực</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Bạn có thể để trống ô này</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="email-verified" name="email-verified" type="email" class="form-control" placeholder="Nhập email xác thực của tài khoản" value="{{ $account->email_verified_at }}">
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-4">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    Thay đổi mật khẩu
                </div>

                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Mật khẩu hiện tại</div>
                            </div>
                            <div class="leading-relaxed text-slate-500 text-xs mt-3">Nhập mật khẩu của tài khoản hiện tại</div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="current-password" name="current-password" type="password" class="form-control" placeholder="Nhập mật khẩu của tài khoản">
                    </div>
                </div>

                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Mật khẩu mới</div>
                            </div>
                            <div class="leading-relaxed text-slate-500 text-xs mt-3">Nhập mật khẩu, tối thiểu 8 ký tự</div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Nhập mật khẩu mới">
                    </div>
                </div>

                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Xác nhận mật khẩu mới</div>
                            </div>
                            <div class="leading-relaxed text-slate-500 text-xs mt-3">Nhập lại mật khẩu của bạn</div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Xác nhận mật khẩu mới">
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
