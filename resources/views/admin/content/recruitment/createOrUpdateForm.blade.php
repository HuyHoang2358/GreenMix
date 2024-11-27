@extends('admin.layouts.adminApp')
@section('title', $isUpdate ? 'Cập nhật thông tin tuyển dụng' : 'Thêm mới thông tin tuyển dụng')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.recruitment.index')}}">Quản lý tuyển dụng</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="#"> {{ $isUpdate ? 'Cập nhật thông tin tuyển dụng' : 'Thêm mới thông tin tuyển dụng' }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')

    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <!-- Title page -->
    @include('admin.common.titleForm', ['titleForm' =>  $isUpdate ? 'Cập nhật thông tin tuyển dụng' : 'Thêm mới thông tin tuyển dụng'])

    <!-- Form update information -->
    @php($actionRoute = $isUpdate ? route('admin.recruitment.update', ['id' => $item->id]) : route('admin.recruitment.store'))

    <form id="recruitment-form" action="{{ $actionRoute }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin tuyển dụng
                </div>
                <div class="mt-5">
                    <!-- Nhóm công việc -->
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Nhóm công việc</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="category" name="category" class="form-control">
                                @include('admin.content.category.option', ["categories" =>$categories, 'level' => 0, 'parent_id' => isset($item) ? $item->category->id : null])
                            </select>
                        </div>
                    </div>

                    <!-- Tên vị trí tuyển dụng -->
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Vị trí tuyển dụng</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Vị trí tuyển dụng không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nhập vị trí tuyển dụng" required autofocus value="{{ isset($item) ? $item->name : ''}}">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="name" max-characters="100">0</span>/100 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Ngày tiếp nhận hồ sơ</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Ngày bắt đầu tuyển dụng</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="start_date" name="start_date" type="date" class="form-control" required autofocus value="{{ isset($item) ? $item->start_date : ''}}">
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Hạn cuối tiếp nhận hồ sơ</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Ngày kết thúc tuyển dụng</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="end_date" name="end_date" type="date" class="form-control" required autofocus value="{{ isset($item) ? $item->end_date : ''}}">
                        </div>
                    </div>




                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Địa chỉ tuyển dụng</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Địa chỉ tuyển dụng không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="address" name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" required autofocus value="{{ isset($item) ? $item->address : ''}}">
                            <div class="form-help text-right">Tối đa <span class="word-counter" input-to-count="address" max-characters="255">0</span>/255 ký tự</div>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Số lượng nhân sự</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Số lượng người cần tuyển phải lớn hơn 0</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="num_people" name="num_people" type="number" class="form-control" placeholder="Nhập số lượng" required autofocus value="{{ isset($item) ? $item->num_people : ''}}">
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
                            <textarea id="recruitment-description" name="description" class="form-control h-64 resize-none" placeholder="Nhập mô tả" required autofocus>{{ isset($item) ? $item->description : ''}}</textarea>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Yêu cầu</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Cung cấp thông tin về những yêu cầu mà người ứng tuyển cần đáp ứng</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea id="recruitment-requirement" name="requirements" class="form-control h-64 resize-none" placeholder="Nhập yêu cầu" required autofocus>{{ isset($item) ? $item->requirements : ''}}</textarea>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Quyền lợi</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Cung cấp thông tin về những quyền lợi cho người ứng tuyển</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea id="recruitment-benefit" name="benefit" class="form-control h-64 resize-none" placeholder="Nhập quyền lợi" required autofocus>{{ isset($item) ? $item->benefit : ''}}</textarea>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Nội dung</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3">Cung cấp thông tin khác cho người ứng tuyển</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea id="recruit-content" name="content" class="form-control h-64 resize-none" placeholder="Nhập nội dung" autofocus>{{ isset($item) ? $item->content : ''}}</textarea>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Buttons cancel and save -->
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.recruitment.index')])

    </form>

@endsection
