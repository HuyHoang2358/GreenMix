@extends('admin.layouts.adminApp')
@section('title', 'Cài đặt địa chỉ')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Cài đặt địa chỉ</a></li>
        </ol>
    </nav>
@endsection

<!-- Define route for delete action -->
@php($routeDelete = route('admin.setting.address.destroy'))

@section('content')

    <div class="intro-y box">
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Quản lý địa chỉ',
            'routeAdd' => route('admin.setting.address.add'),
            'titleButton' => 'Thêm mới địa chỉ'
        ])
        <!-- End Table title -->

        <!-- BEGIN: HTML Table Data -->
        <div class="intro-y col-span-12 lg:col-span-12 mt-2">
            <div class="py-2 px-4">
                <div class="overflow-x-auto">
                    <table  class="table table-hover table-bordered">
                        <thead class="table-dark">
                        <tr class="text-center">
                            <th class="whitespace-nowrap w-8">STT</th>
                            <th class="whitespace-nowrap">Tên địa chỉ</th>
                            <th class="whitespace-nowrap">Mô tả</th>
                            <th class="whitespace-nowrap">Đường dẫn bản đồ</th>
                            <th class="whitespace-nowrap">Thứ tự</th>
                            <th class="whitespace-nowrap">Trạng thái</th>
                            <th class="whitespace-nowrap">Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($addresses) > 0)
                            @foreach($addresses as $key => $address)
                            <tr>
                                <td class="text-center">{{ ($addresses->currentPage() - 1 ) * $addresses->perPage() + $loop->index + 1 }}</td>
                                <td>{{$address->name}}</td>
                                <td>{{$address->detail}}</td>
                                <td>
                                    <iframe src="{{$address->iframe}}"></iframe>
                                </td>
                                <td>{{$address->order}}</td>
                                <td>
                                    @if($address->is_show == 1)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center items-center">
                                        <!-- Edit button -->
                                        @include('admin.common.editButton', [
                                            'routeEdit' => route('admin.setting.address.edit', ['id' => $address->id])
                                        ])

                                        <!-- Delete button -->
                                        @include('admin.common.deleteButton', [
                                            'deleteObjectName' => $address->name,
                                            'deleteObjectId' => $address->id
                                        ])
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="7">Hiện tại không có địa chỉ nào.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($addresses->lastPage() > 1)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{$addresses->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
