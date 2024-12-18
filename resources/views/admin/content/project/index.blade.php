@extends('admin.layouts.adminApp')
@section('title', 'Quản lý dự án')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Quản lý dự án hợp tác</a></li>
        </ol>
    </nav>
@endsection

<!-- Define route for delete action -->
@php($routeDelete = route('admin.project.destroy'))

@section('content')
    <div class="intro-y box">
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Quản lý dự án',
            'routeAdd' => route('admin.project.add'),
            'titleButton' => 'Thêm mới dự án'
        ])
        <!-- End Table title -->

        <!-- BEGIN: HTML Table Data -->
        <div class="intro-y col-span-12 lg:col-span-12 mt-2">
            <div class="py-2 px-4">
                <div class="overflow-x-auto">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark ">
                            <tr>
                                <th class="whitespace-nowrap text-center w-8">STT</th>
                                <th class="whitespace-nowrap">Tên</th>
                                <th class="whitespace-nowrap">Slug</th>
                                <th class="whitespace-nowrap w-40 text-center">Hình ảnh</th>
                                <th class="whitespace-nowrap">Địa chỉ</th>
                                <th class="whitespace-nowrap">Thứ tự hiển thị</th>
                                <th class="whitespace-nowrap text-center w-24">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($projects) > 0)
                                @foreach($projects as $project)
                                    <tr>
                                        <td class="text-center">{{ ($projects->currentPage() - 1 ) * $projects->perPage() + $loop->index + 1 }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->slug }}</td>
                                        <td>
                                            <img class="h-20 w-40 rounded" src="{{ asset($project->image) }}" alt="post_{{ $project->name }}_image">
                                        </td>
                                        <td>{{ $project->address }}</td>
                                        <td>{{ $project->order }}</td>
                                        <td>
                                            <div class="flex justify-center items-center gap-2">
                                                <!-- Edit button -->
                                                @include('admin.common.editButton', [
                                                    'routeEdit' => route('admin.project.edit', ['id' => $project->id])
                                                ])

                                                <!-- Delete button -->
                                                @include('admin.common.deleteButton', [
                                                    'deleteObjectName' => $project->name,
                                                    'deleteObjectId' => $project->id
                                                ])
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="6">Hiện tại không có dự án nào.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if($projects->lastPage() > 1)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{ $projects->links()}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
