@extends('admin.layouts.adminApp')
@section('title')
    {{$type == 'post' ? 'Danh mục  bài viết' : 'Vị trí tuyển dụng'}}
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.category.index', $type)}}">{{$type == 'post' ? 'Danh mục  bài viết' : 'Vị trí tuyển dụng'}} </a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{$type_name}}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{route('admin.category.add', $type)}}"><button class="btn btn-primary shadow-md mr-2"> Thêm mới danh mục </button></a>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i data-lucide="printer"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="#" class="dropdown-item"> In </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item"> Xuất file excel </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y col-span-12 lg:col-span-12 mt-2">
        <div class="intro-y box py-2 px-4">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Tên danh mục</th>
                        <th class="whitespace-nowrap">Slug</th>
                        <th class="whitespace-nowrap">Mô tả</th>
                        <th class="whitespace-nowrap">Thao tác</th>
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
@endsection
