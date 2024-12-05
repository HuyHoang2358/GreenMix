@extends('admin.layouts.adminApp')
@section('title', 'Quản lý tuyển dụng')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Quản lý tuyển dụng</a></li>
        </ol>
    </nav>
@endsection
@php
    use Carbon\Carbon;
    $routeDelete = route('admin.recruitment.destroy');
@endphp
@section('content')
    <div class="intro-y box" >
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Quản lý tuyển dụng',
            'routeAdd' => route('admin.recruitment.add'),
            'titleButton' => 'Đăng tin tuyển dụng'
        ])
        <!-- End Table title -->

        <!-- BEGIN: HTML Table Data -->
        <div class="intro-y col-span-12 lg:col-span-12 mt-2">
            <div class="py-2 px-4">
                <div class="overflow-x-auto">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="whitespace-nowrap text-center w-8">STT</th>
                                <th class="whitespace-nowrap">Vị trí tuyển dụng</th>
                                <th class="whitespace-nowrap text-center">Thời gian</th>
                                <th class="whitespace-nowrap">Địa chỉ</th>
                                <th class="whitespace-nowrap text-center">Số lượng</th>
                                <th class="whitespace-nowrap text-center">Trạng thái</th>
                                <th class="whitespace-nowrap text-center">Slug</th>
                                <th class="whitespace-nowrap text-center">Hình ảnh</th>
                                <th class="whitespace-nowrap text-center w-24">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($recruitments) > 0)
                                @foreach ($recruitments as $recruitment)
                                    <tr>
                                        <td class="text-center">
                                            {{ ($recruitments->currentPage() - 1) * $recruitments->perPage() + $loop->index + 1 }}
                                        </td>
                                        <td>{{ $recruitment->name }}</td>
                                        <td style="max-width: 16rem;">
                                            <div class="flex flex-row items-center gap-2">
                                                <div class="flex flex-col gap-2">
                                                    <div>
                                                        <span class="font-semibold">Ngày bắt đầu: </span> {{ $recruitment->start_date }}
                                                    </div>
                                                    <div>
                                                        <span class="font-semibold">Ngày kết thúc: </span> {{ $recruitment->end_date }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $recruitment->address }}</td>
                                        <td class="text-center">{{ $recruitment->num_people }}</td>
                                        <td>
                                            @if (Carbon::parse($recruitment->end_date)->isPast())
                                                <span
                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md w-fit"
                                                >
                                                    Đã hết thời gian tuyển dụng
                                                </span>
                                            @else
                                                <span
                                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md w-fit"
                                                >
                                                    Đang tuyển dụng
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{$recruitment -> slug}}</td>
                                        <td>
                                            <img src="{{$recruitment -> image}}" alt="" class="w-24">
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center gap-2">
                                                <!-- Edit button -->
                                                @include('admin.common.editButton', [
                                                    'routeEdit' => route('admin.recruitment.edit', ['id' => $recruitment->id])
                                                ])

                                                <!-- Delete button -->
                                                @include('admin.common.deleteButton', [
                                                    'deleteObjectName' => $recruitment->name,
                                                    'deleteObjectId' => $recruitment->id
                                                ])

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="7">Hiện tại không có tin tuyển dụng nào!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($recruitments->lastPage() > 1)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{ $recruitments->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
