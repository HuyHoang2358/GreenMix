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
@section('content')
    @include('admin.partials.action_alerts')
    @include('admin.content.product.delete')
    @php($routeDelete = route('admin.setting.banner.destroy'))

    <div class="intro-y flex flex-col sm:flex-row items-center my-7">
        <h2 class="text-xl font-medium mr-auto">
            Danh sách Banner
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{route('admin.setting.banner.add')}}"><button class="btn btn-primary shadow-md mr-2"> Thêm mới Banner </button></a>
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
    <div class="p-2 bg-white rounded-xl">
        <div class="p-5" id="head-options-table">
            <div >
                <div class="overflow-x-auto">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th class="whitespace-nowrap">#</th>
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
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('admin.setting.banner.edit', ['id' => $banner->id]) }}" class="mr-1">
                                            <button type="button" class="btn btn-outline-warning p-1 w-8 h-8"> <i data-lucide="edit-3"></i></button>
                                        </a>
                                        <a class="mr-1">
                                            <button data-tw-toggle="modal"  type="button" class="btn btn-outline-danger p-1 w-8 h-8" data-tw-target="#delete-object-confirm-form"
                                                    onclick='openConfirmDeleteObjectForm("{{ $banner->name }}", {{ $banner->id }})'>
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
                <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{$banners->links()}}</div>
            </div>
        </div>
    </div>
@endsection
