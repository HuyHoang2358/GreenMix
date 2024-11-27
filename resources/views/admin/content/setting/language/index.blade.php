@extends('admin.layouts.adminApp')
@section('title', 'Quản lý ngôn ngữ')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Quản lý ngôn ngữ</a></li>
        </ol>
    </nav>
@endsection

<!-- Define route for delete action -->
@php($routeDelete = route('admin.setting.language.destroy'))

@section('content')
    <!-- Table title -->
    <div class="intro-y box">
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Quản lý ngôn ngữ',
            'routeAdd' => route('admin.setting.language.add'),
            'titleButton' => 'Thêm mới ngôn ngữ',
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
                            <th class="whitespace-nowrap">Tên Ngôn Ngữ</th>
                            <th class="whitespace-nowrap">Slug</th>
                            <th class="whitespace-nowrap w-32">Icon</th>
                            <th class="whitespace-nowrap w-24 text-center">Thao Tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($languagues) > 0)
                        @foreach ($languagues as $key => $languague)
                            <tr>
                                <td class="text-center">{{$key + 1}}</td>
                                <td>{{$languague -> name}}</td>
                                <td>{{$languague -> slug}}</td>
                                <td>
                                    <img src="{{$languague -> icon}}" alt="" class="w-24">
                                </td>
                                <td>
                                    <div class="flex gap-2 justify-center items-center">
                                        <!-- Edit button -->
                                        @include('admin.common.editButton', [
                                            'routeEdit' => route('admin.setting.language.edit', ['id' => $languague->id])
                                        ])

                                        <!-- Delete button -->
                                        @include('admin.common.deleteButton', [
                                            'deleteObjectName' => $languague->name,
                                            'deleteObjectId' => $languague->id
                                        ])
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Hiện tại không có ngôn ngữ nào.
                                    <span class="font-semibold"> Vui lòng thêm ngôn ngữ vào hệ thống!</span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($languagues->lastPage() > 1)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{$languagues->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
