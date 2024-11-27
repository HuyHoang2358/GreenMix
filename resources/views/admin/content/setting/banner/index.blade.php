@extends('admin.layouts.adminApp')
@section('title', 'Cài đặt banner')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Cài đặt banner</a></li>
        </ol>
    </nav>
@endsection

<!-- Define route for delete action -->
@php($routeDelete = route('admin.setting.banner.destroy'))

@section('content')
    <div class="intro-y box">
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Quản lý Banner',
            'routeAdd' => route('admin.setting.banner.add'),
            'titleButton' => 'Thêm mới Banner'
        ])
        <!-- End Table title -->

        <!-- BEGIN: HTML Table Data -->
        <div class="p-5" id="head-options-table">
            <div class="py-2 px-4">
                <div class="overflow-x-auto">
                    <table  class="table table-hover table-bordered">
                        <thead class="table-dark">
                        <tr class="text-center">
                            <th class="whitespace-nowrap w-8">STT</th>
                            <th class="whitespace-nowrap">Tên Banner</th>
                            <th class="whitespace-nowrap">Tiêu đề</th>
                            <th class="whitespace-nowrap">Mô tả</th>
                            <th class="whitespace-nowrap">Đường dẫn đính kèm</th>
                            <th class="whitespace-nowrap">Trạng thái</th>
                            <th class="whitespace-nowrap">Ảnh</th>
                            <th class="whitespace-nowrap">Thứ tự</th>
                            <th class="whitespace-nowrap">Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($banners) > 0)
                            @foreach($banners as $key => $banner)
                            <tr>
                                <td class="text-center">{{ ($banners->currentPage() - 1 ) * $banners->perPage() + $loop->index + 1 }}</td>
                                <td>{{$banner->name}}</td>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->description}}</td>
                                <td>{{$banner->attach_link}}</td>
                                <td>
                                    @if($banner->is_show == 1)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td><img class="max-w-40" src="{{$banner->path}}" alt=""></td>
                                <td>{{$banner->order}}</td>
                                <td>
                                    <div class="flex gap-2 justify-center items-center">
                                        <!-- Edit button -->
                                        @include('admin.common.editButton', [
                                            'routeEdit' => route('admin.setting.banner.edit', ['id' => $banner->id])
                                        ])

                                        <!-- Delete button -->
                                        @include('admin.common.deleteButton', [
                                            'deleteObjectName' => $banner->name,
                                            'deleteObjectId' => $banner->id
                                        ])
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="9">Hiện tại không có Banner nào.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($banners->lastPage() > 1)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{$banners->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
