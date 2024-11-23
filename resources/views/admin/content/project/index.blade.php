@extends('admin.layouts.adminApp')
@section('title', 'Quản lý dự án')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Dự án hợp tác</a></li>
        </ol>
    </nav>
@endsection
<!-- Define route for delete action -->
@php($routeDelete = route('admin.project.destroy'))

@section('content')
    <!-- Table title -->
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-xl font-medium mr-auto">
            Quản lý dự án
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('admin.project.add') }}">
                <button class="btn btn-primary shadow-md mr-2"> Thêm mới dự án</button>
            </a>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"><i data-lucide="printer"></i></span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li><a href="#" class="dropdown-item"> In </a></li>
                        <li><a href="#" class="dropdown-item"> Xuất file excel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Table title -->

    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y col-span-12 lg:col-span-12 mt-4">
        <div class="intro-y box">
            <div class="overflow-x-auto">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark ">
                        <tr>
                            <th class="whitespace-nowrap text-center">STT</th>
                            <th class="whitespace-nowrap">Tên</th>
                            <th class="whitespace-nowrap">Hình ảnh</th>
                            <th class="whitespace-nowrap">Địa chỉ</th>
                            <th class="whitespace-nowrap text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td class="text-center">{{ ($projects->currentPage() - 1 ) * $projects->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $project->name }}</td>
                                <td>
                                    <img class="h-20 w-40 rounded" src="{{ asset($project->image) }}" alt="post_{{ $project->name }}_image">
                                </td>
                                <td>{{ $project->address }}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('admin.project.edit', ['id' => $project->id]) }}" class="mr-1">
                                            <button type="button" class="btn btn-outline-warning p-1 w-8 h-8"> <i data-lucide="edit-3"></i></button>
                                        </a>
                                        <a class="mr-1">
                                            <button data-tw-toggle="modal" type="button" class="btn btn-outline-danger p-1 w-8 h-8" data-tw-target="#delete-object-confirm-form"
                                                    onclick='openConfirmDeleteObjectForm("{{ $project->name }}", {{ $project->id }})'>
                                                <i data-lucide="trash-2"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{ $projects->links()}}</div>
        </div>
    </div>
@endsection
