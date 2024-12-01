@extends('admin.layouts.adminApp')
@section('title', 'Quản lý liên hệ')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Quản lý liên hệ</a></li>
        </ol>
    </nav>
@endsection

<!-- Define route for delete action -->
@php($routeDelete = route('admin.dataUser.destroy'))


@section('content')

    <div class="intro-y box">
        <!-- Table title -->
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
            <h2 class="font-medium text-xl mr-auto">
                Thông tin liên hệ
            </h2>
        </div>
        <!-- End Table title -->

        <!-- BEGIN: HTML Table Data -->
        <div class="intro-y col-span-12 lg:col-span-12 mt-2">
            <div class="py-2 px-4">
                <div class="overflow-x-auto">
                    <table  class="table table-hover table-bordered">
                        <thead class="table-dark">
                        <tr class="text-center">
                            <th class="whitespace-nowrap w-8">STT</th>
                            <th class="whitespace-nowrap">Tên Người Gửi</th>
                            <th class="whitespace-nowrap">Tên Công Ty</th>
                            <th class="whitespace-nowrap">Số Điện Thoại</th>
                            <th class="whitespace-nowrap text-center">Nội Dung</th>
                            <th class="whitespace-nowrap text-center">Trạng thái</th>
                            <th class="whitespace-nowrap text-center w-24">Thao Tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($dataUsers) > 0)
                            @foreach($dataUsers as  $dataUser)
                            <tr>
                                <td class="text-center">{{ ($dataUsers->currentPage() - 1 ) * $dataUsers->perPage() + $loop->index + 1 }}</td>
                                <td>{{$dataUser -> name}}</td>
                                <td>{{$dataUser -> company}}</td>
                                <td>{{$dataUser -> phone}}</td>
                                <td>{{$dataUser -> content}}</td>
                                <td>{{$dataUser -> status == 2 ? 'Đã xử lý': 'Chưa xử lý'}}</td>
                                <td>
                                    <div class="flex gap-2 justify-center items-center">
                                        <!-- Edit button -->
                                        @if($dataUser->status == 1)
                                            <a href="{{route('admin.dataUser.edit', ['id' => $dataUser->id])}}">
                                                <button type="button" class="btn btn-outline-warning p-1 w-8 h-8"> <i data-lucide="pocket"></i></button>
                                            </a>
                                        @endif

                                        <!-- Delete button -->
                                        @include('admin.common.deleteButton', [
                                            'deleteObjectName' => $dataUser->name,
                                            'deleteObjectId' => $dataUser->id
                                        ])
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Hiện tại không có liên hệ nào trong hệ thống</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($dataUsers->lastPage() > 1)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{$dataUsers->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection

