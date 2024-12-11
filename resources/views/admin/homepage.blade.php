@extends('admin.layouts.adminApp')
@section('title', 'Trang quản trị')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Dashboard</a></li>
        </ol>
    </nav>
@endsection
<!-- Define route for delete action -->
@php
    $routeDelete = route('admin.product.destroy');
@endphp
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Official Store -->
                <div class="col-span-12 xl:col-span-8 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Cửa hàng chính thức
                        </h2>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div><span>{{count($addresses)}}</span> địa chỉ cửa hàng trên toàn quốc. Chọn xem thêm bên cạnh để hiển thị danh sách.</div>
                        <iframe id="iframe-preview" src="" class="report-maps mt-5 bg-slate-200 rounded-md w-full"></iframe>
                    </div>
                </div>
                <!-- END: Official Store -->

                <!-- BEGIN: Danh sách cửa hàng -->
                <div class="col-span-12 lg:col-span-8 xl:col-span-4 mt-6">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Danh sách cửa hàng
                        </h2>
                    </div>
                    <div class="mt-5">
                        @foreach($addresses->take(5) as $address)
                        <div class="intro-y address-iframe" onclick="setValueForIframe(this)" data-base="{{$address->iframe}}">
                            <div class="box pl-4 pr-5 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-4 pr-3 mr-auto">
                                    <div class="font-medium">{{$address->name}}</div>
                                </div>
                                <div class="py-2 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium hidden"></div>
                            </div>
                        </div>
                        @endforeach
                        <a href="{{route('admin.setting.address.index')}}" class="intro-y w-full block text-center zoom-in rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">Xem thêm</a>
                    </div>
                </div>
                <!-- END: Danh sách cửa hàng -->

                <!-- BEGIN: Danh sách sản phẩm -->
                <div class="col-span-12 ">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Danh sách sản phẩm
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="{{route('admin.product.index')}}" class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i>Xem thêm sản phẩm </a>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                            <tr>
                                <th class="whitespace-nowrap">HÌNH ẢNH</th>
                                <th class="whitespace-nowrap">TÊN SẢN PHẨM</th>
                                <th class="text-center whitespace-nowrap">TRẠNG THÁI</th>
                                <th class="text-center whitespace-nowrap">HÀNH ĐỘNG</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            @php
                                                $images = json_decode($product->images);

                                            @endphp
                                            <img alt="{{$product->slug}}" class="tooltip rounded-full" src="{{$images[0]}}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap">{{$product->name}}</a>
                                </td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Đã hiển thị </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center gap-5">
                                        <!-- Edit button -->
                                        @include('admin.common.editButton', [
                                            'routeEdit' => route('admin.product.edit', ['id' => $product->id])
                                        ])
                                        <!-- Delete button -->
                                        @include('admin.common.deleteButton', [
                                            'deleteObjectName' => $product->name,
                                            'deleteObjectId' => $product->id
                                        ])
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($products->lastPage() > 1)
                        <div class="rounded-b bg-white p-2 pl-4 border">{{$products->links()}}</div>
                    @endif
                </div>
                <!-- END: Danh sách sản phẩm -->
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">

                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">
                                Ghi chú khách hàng
                            </h2>
                            <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                            <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tiny-slider" id="important-notes">
                                    @foreach($dataUsers as $dataUser)
                                        @if($dataUser -> status == 1)
                                            <div class="p-5 h-60 relative">
                                                <div class="text-base font-medium truncate">{{$dataUser->name}}</div>
                                                <div class="text-slate-400 mt-1">{{$dataUser->created_at}}</div>
                                                <div class="text-slate-500 text-justify mt-1 line-clamp-5">{{$dataUser->content}}</div>
                                                <div class="font-medium flex absolute bottom-5 right-5">
                                                    <a href="{{route('admin.dataUser.index')}}"><button type="button" class="btn btn-secondary py-1 px-2">Xem thêm</button></a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->

                    <!-- BEGIN: Schedules -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                        <div class="flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Lịch biểu</h2>
                        </div>
                        <div class="mt-5">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-5">
                                <!-- Month Navigation -->
                                <div class="flex items-center justify-between px-5">
                                    <i class="fa-solid fa-angles-left text-xl text-primary cursor-pointer" onclick="changeMonth(-1)"></i>
                                    <div class="font-medium text-lg" id="current-month"></div>
                                    <i class="fa-solid fa-angles-right text-xl text-primary cursor-pointer" onclick="changeMonth(1)"></i>
                                </div>
                                <!-- Calendar Grid -->
                                <div class="grid grid-cols-7 gap-2 mt-5 text-center text-sm" id="calendar-grid">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Schedules -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Lấy iframe
            const iframe = document.getElementById("iframe-preview");

            // Lấy div đầu tiên với class "address-iframe"
            const firstDiv = document.querySelector(".address-iframe");

            // Gán giá trị data-base của div đầu tiên vào src của iframe
            if (firstDiv) {
                iframe.src = firstDiv.getAttribute("data-base");
            }
        });
        function setValueForIframe(element){
            const iframeSrc = element.getAttribute("data-base");
            const iframePreview = document.getElementById("iframe-preview");

            const addressList = document.querySelectorAll('.address-iframe')
            addressList.forEach((address) => {
                const indicator = address.querySelector('div > div:nth-child(2)');
                if (indicator) {
                    indicator.classList.add('hidden'); // Ẩn class nếu tồn tại
                }
            });
            const selectedIndicator = element.querySelector('div > div:nth-child(2)');
            if (selectedIndicator) {
                selectedIndicator.classList.remove('hidden'); // Hiển thị class
            }

            if (iframeSrc && iframePreview) {
                iframePreview.src = iframeSrc;
            }
        }
        // Đảm bảo thẻ đầu tiên không bị ẩn khi tải lại trang
        document.addEventListener('DOMContentLoaded', function () {
            const firstAddress = document.querySelector('.address-iframe');
            if (firstAddress) {
                setValueForIframe(firstAddress);
            }
        });

        // lịch biểu
        const monthNames = [
            "Tháng 1 -", "Tháng 2 -", "Tháng 3 -", "Tháng 4 -", "Tháng 5 -", "Tháng 6 -",
            "Tháng 7 -", "Tháng 8 -", "Tháng 9 -", "Tháng 10 -", "Tháng 11 -", "Tháng 12 -",
        ];

        let currentDate = new Date();

        function renderCalendar() {
            const currentMonth = currentDate.getMonth();
            const currentYear = currentDate.getFullYear();
            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            const calendarGrid = document.getElementById("calendar-grid");
            const monthDisplay = document.getElementById("current-month");

            // Cập nhật tháng
            monthDisplay.textContent = `${monthNames[currentMonth]} ${currentYear}`;
            calendarGrid.innerHTML = "";

            // Tạo ô trống cho các ngày đầu tuần
            for (let i = 0; i < firstDay; i++) {
                const emptyDiv = document.createElement("div");
                calendarGrid.appendChild(emptyDiv);
            }

            // Tạo các ngày trong tháng
            for (let day = 1; day <= daysInMonth; day++) {
                const dayDiv = document.createElement("div");
                dayDiv.textContent = day;
                dayDiv.className = "py-2 rounded-full cursor-pointer";

                // Làm nổi bật ngày hiện tại
                if (
                    day === currentDate.getDate() &&
                    currentMonth === new Date().getMonth() &&
                    currentYear === new Date().getFullYear()
                ) {
                    dayDiv.classList.add("bg-light-primary", "text-white", "font-bold");
                } else {
                    dayDiv.classList.add("hover:bg-gray-200");
                }

                calendarGrid.appendChild(dayDiv);
            }
        }

        function changeMonth(direction) {
            currentDate.setMonth(currentDate.getMonth() + direction);
            renderCalendar();
        }

        renderCalendar();

    </script>
@endsection
