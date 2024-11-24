@extends('admin.layouts.adminApp')
@section('title', $isUpdate ? 'Cập nhật địa chỉ' : 'Thêm mới địa chỉ')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.setting.address.index')}}">Địa chỉ hợp tác</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="#"> {{ $isUpdate ? 'Cập nhật thông tin' : 'Thêm mới thông tin' }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    <!-- View validate form error -->
    @include('admin.partials.validateFormError')
    <!-- End view validate form error -->

    <!-- Title page -->
    @include('admin.common.titleForm', ['titleForm' =>  $isUpdate ? 'Cập nhật thông tin dự án' : 'Thêm mới dự án'])

    <!-- Form update information -->
    @php($actionRoute = $isUpdate ? route('admin.setting.address.update', ['id' => $item->id]) : route('admin.setting.address.store'))
    <form action="{{ $actionRoute }}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-2">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <i data-lucide="chevron-down"></i>
                    Thông tin địa chỉ
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên địa chỉ</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                                <div class="leading-relaxed text-slate-500 text-xs mt-3"> Tên địa chỉ ngắn gọn và không trùng lặp, và không được để trống</div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="address-name" type="text" class="form-control" placeholder="Nhập tên địa chỉ" name="name" required autofocus
                                   onkeyup="handleCountNumberCharacter('address-name', 'number-character-address-name', 255)"
                                   value="{{$item ?  $item->name : ''}}">
                            <div class="form-help text-right">Tối đa <span id="number-character-address-name">0</span>/255 ký tự</div>
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
                                    <div>Giải thích về địa chỉ để dễ hiểu cho người dùng</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="editor">
                                <textarea class="form-control" rows="3" id="address-detail" name="detail"
                                          onkeyup="handleCountNumberCharacter('address-detail', 'number-character-address-detail', 255)">
                                    {{$item ?  $item->detail : ''}}
                                </textarea>
                            </div>
                            <div class="form-help text-right">Tối đa <span id="number-character-address-detail">0</span>/255 ký tự</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 mt-5">
                        <div class="col-span-3 pr-10">
                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Đường dẫn bản đồ</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Không bắt buộc</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">Đường dẫn bản đồ đúng định dạng và có thể để trống</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="address-iframe" type="text" class="form-control" placeholder="Nhập đường dẫn của địa chỉ" name="iframe"
                                           onkeyup="setValueForIframe()"
                                           value="{{$item ?  $item->iframe : ''}}">
                                </div>
                            </div>

                            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                <div class="form-label xl:w-64 xl:!mr-10">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Số thứ tự hiển thị</div>
                                            <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                        </div>
                                        <div class="leading-relaxed text-slate-500 text-xs mt-3">Số thứ tự hiển thị là số, không trùng lặp và không được để trống</div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 xl:mt-0 flex-1">
                                    <input id="address-slug" type="number" class="form-control" placeholder="Nhập số thứ tự hiển thị của địa chỉ"
                                           name="order" value="{{$item ?  $item->slug : ''}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <iframe id="iframe-preview" class="w-full h-full bg-gray-100" src="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Trạng thái hiển thị</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Bắt buộc</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="address-is-show" class="form-select" name="is_show" required>
                                <option value="1">Có hiển thị </option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buttons cancel and save -->
        @include('admin.common.cancelAndSaveButtons', ['routeCancel' => route('admin.partner.index')])
    </form>
    <script>
        function setValueForIframe(){
            let iframe_src = document.getElementById("address-iframe").value;
            document.getElementById("iframe-preview").src = iframe_src;
        }
    </script>
@endsection
