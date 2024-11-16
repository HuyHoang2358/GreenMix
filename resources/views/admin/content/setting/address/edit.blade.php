@extends('admin.layouts.adminApp')
@section('title')
    Chỉnh sửa địa chỉ
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.setting.address.index')}}">Quản lý địa chỉ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.setting.address.add')}}">Chỉnh sửa</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chỉnh sửa địa chỉ
        </h2>
    </div>
    <form action="{{route('admin.setting.address.update', $address->id)}}" method="post">
        @csrf
        <div class="intro-y box p-5 mt-5">
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
                            <input id="address-name" type="text" class="form-control" placeholder="Nhập tên địa chỉ" onkeyup="handleCountNumberCharacter('address-name', 'number-character-address-name', 255)" name="name" value="{{$address->name}}" required autofocus>
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
                                <textarea id="address-detail" class="form-control" rows="3" onkeyup="handleCountNumberCharacter('address-detail', 'number-character-address-detail', 255)" name="detail">{{$address->detail}}</textarea>
                            </div>
                            <div class="form-help text-right">Tối đa <span id="number-character-address-detail">0</span>/255 ký tự</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-8 mt-5">
                        <div class="col-span-3">
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
                                    <input id="address-iframe" type="text" class="form-control" placeholder="Nhập đường dẫn của địa chỉ"  name="iframe" value="{{$address->iframe}}" onkeyup="setValueForIframe()">
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
                                    <input id="address-is-show" type="number" class="form-control" placeholder="Nhập số thứ tự hiển thị của địa chỉ" name="order" value="{{$address->order}}" required>
                                    <div class="form-help text-right">Tối đa 0/100 ký tự</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <iframe id="iframe-preview" class="w-full h-full bg-gray-100" src="{{$address->iframe}}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                @if ($address->is_show == '1')
                                    <option value="1" selected>Có hiển thị </option>
                                    <option value="0">Không hiển thị</option>
                                @else
                                    <option value="1">Có hiển thị </option>
                                    <option value="0" selected>Không hiển thị</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <a href="{{route('admin.setting.address.index')}}">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Hủy</button>
            </a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu thông tin</button>
        </div>
        </div>
    </form>
    @include('admin.partials.stand_alone_lfm')
    <script>
        function setValueForIframe(){
            let iframe_src = document.getElementById("address-iframe").value;
            document.getElementById("iframe-preview").src = iframe_src;
        }
    </script>
@endsection
