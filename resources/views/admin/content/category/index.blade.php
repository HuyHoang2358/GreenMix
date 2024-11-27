@extends('admin.layouts.adminApp')
@section('title', $type_name)
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$type_name}} </a></li>
        </ol>
    </nav>
@endsection


<!-- Define route for delete action -->
@php($routeDelete = route('admin.category.destroy', $type))

@section('content')
    <div class="intro-y box">
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => $type_name,
            'routeAdd' => route('admin.category.add', $type),
            'titleButton' => 'Thêm mới'
        ])
        <!-- BEGIN: HTML Table Data -->
        <div class="intro-y col-span-12 lg:col-span-12 mt-2">
            <div class="py-2 px-4">
                <div class="overflow-x-auto">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th class="whitespace-nowrap text-center w-8">#</th>
                            <th class="whitespace-nowrap">Tên danh mục</th>
                            <th class="whitespace-nowrap">Slug</th>
                            <th class="whitespace-nowrap">Mô tả</th>
                            <th class="whitespace-nowrap text-center w-24">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                            @include("admin.content.category.row_table_index",["categories"=>$categories, "level"=>0, 'type'=>$type])
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END: HTML Table Data -->
    </div>
@endsection
