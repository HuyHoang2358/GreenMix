@extends('admin.layouts.adminApp')
@section('title', 'Đối tác')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Đối tác </a></li>
        </ol>
    </nav>
@endsection

<!-- Define route for delete action -->
@php($routeDelete = route('admin.partner.destroy'))

@section('content')

    <div class="intro-y box">
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Danh sách đối tác',
            'routeAdd' => route('admin.partner.add'),
            'titleButton' => 'Thêm mới đối tác'
        ])
        <!-- End Table title -->

        <!-- BEGIN: HTML Table Data -->
        <div class="intro-y col-span-12 lg:col-span-12 mt-2">
            <div class="py-2 px-4">
                <div class="overflow-x-auto">
                    <table  class="table table-hover table-bordered">
                        <thead class="table-dark">
                        <tr class=" text-center">
                            <th class="whitespace-nowrap w-8">STT</th>
                            <th class="whitespace-nowrap">Tên Đối Tác</th>
                            <th class="whitespace-nowrap">Logo</th>
                            <th class="whitespace-nowrap">Đường Dẫn Của Đối Tác</th>
                            <th class="whitespace-nowrap">Thứ Tự</th>
                            <th class="whitespace-nowrap text-center w-24">Thao Tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($partners) > 0)
                            @foreach ($partners as $partner)
                            <tr>
                                <td class="text-center">{{ ($partners->currentPage() - 1 ) * $partners->perPage() + $loop->index + 1 }}</td>
                                <td>{{$partner -> name}}</td>
                                <td>
                                    <img class="max-w-32" src="{{ asset($partner->logo)}}" alt="">
                                </td>
                                <td>{{$partner -> url}}</td>
                                <td>{{$partner -> order}}</td>
                                <td>
                                    <div class="flex gap-2 justify-center items-center">
                                        <!-- Edit button -->
                                        @include('admin.common.editButton', [
                                            'routeEdit' => route('admin.partner.edit', ['id' => $partner->id])
                                        ])

                                        <!-- Delete button -->
                                        @include('admin.common.deleteButton', [
                                            'deleteObjectName' => $partner->name,
                                            'deleteObjectId' => $partner->id
                                        ])
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Hiện tại không có đối tác nào.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($partners->lastPage() > 1)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{$partners->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
