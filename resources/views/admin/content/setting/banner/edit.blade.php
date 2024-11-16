@extends('admin.layouts.adminApp')
@section('title')
    Thêm mới banner
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.setting.banner.index')}}">Quản lý banner</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.setting.banner.add')}}">Chỉnh sửa</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chỉnh sửa Banner
        </h2>
    </div>
    <form action="{{route('admin.setting.banner.update', $banner->id)}}" method="post">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin Banner
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên Banner</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên banner ngắn gọn và không trùng lặp, và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="category-name" type="text" class="form-control" placeholder="Nhập tên banner" name="name" value="{{$banner->name}}" required autofocus>
                            <div class="form-help text-right">Tối đa 0/255 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tiêu đề</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Tiêu đề ngắn gọn và không trùng lặp, không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="category-slug" type="text" class="form-control" placeholder="Nhập tiêu đề của banner" name="title" value="{{$banner->title}}" required>
                            <div class="form-help text-right">Tối đa 0/200 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Mô tả</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    <div>Giải thích về banner để dễ hiểu cho người dùng</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="editor">
                                <textarea class="form-control" rows="3" name="description">{{$banner->description}}</textarea>
                            </div>
                            <div class="form-help text-right">Tối đa 0/255 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Đường dẫn đính kèm</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Đường dẫn không trùng lặp và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="category-slug" type="text" class="form-control" placeholder="Nhập đường dẫn đính kèm của banner" name="attach_link" value="{{$banner->attach_link}}" required>
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <label class="font-medium" for="banner-is-show">Trạng thái hiển thị</label>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="banner-is-show" class="form-select" name="is_show" required>
                                @if($banner->is_show == 1)
                                    <option value="1" selected>Có hiển thị </option>
                                    <option value="0" >Không hiển thị</option>
                                @else
                                    <option value="1" >Có hiển thị </option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Đường dẫn ảnh</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Đường dẫn ảnh không trùng lặp và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 grid grid-cols-4 gap-10">
                            <div class="col-span-3">
                                <div id="image" class="input-group flex gap-2">
                                <span class="input-group-btn pr-3">
                                    <a id="post-img-preview" data-input="banner-path" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn
                                    </a>
                                </span>
                                    <input id="banner-path" readonly="" type="text" class="form-control" name="path" value="{{$banner->path}}" required>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <label for="holder" class="form-label">Hình ảnh xem trước</label>
                                <div id="holder" style="margin-top:15px">
                                    @if($banner->path)
                                        <img class="w-40 h-16" src="{{$banner->path}}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Số thứ tự hiển thị</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Số thứ tự hiển thị không trùng lặp và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="category-slug" type="number" class="form-control" placeholder="Nhập số thứ tự hiển thị của tên banner" name="order" value="{{$banner->order}}" required>
                            <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{route('admin.setting.banner.index')}}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
        </div>
    </form>
    @include('admin.partials.stand_alone_lfm')
@endsection
