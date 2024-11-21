@extends('admin.layouts.adminApp')
@section('title', 'Sản phẩm')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Sản phẩm </a>
            </li>
        </ol>
    </nav>
@endsection
@php
    $routeDelete = route('admin.product.destroy');
@endphp
@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Quản lý sản phẩm
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('admin.product.add') }}"><button class="btn btn-primary shadow-md mr-2"> Thêm mới sản phẩm
                </button></a>
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
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="whitespace-nowrap text-center">STT</th>
                            <th class="whitespace-nowrap">Tên</th>
                            <th class="whitespace-nowrap">Slug</th>
                            <th class="whitespace-nowrap">Hình ảnh</th>
                            <th class="whitespace-nowrap">Mô tả</th>
                            <th class="whitespace-nowrap text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) == 0)
                            <tr>
                                <td class="text-center" colspan="6">Hiện tại không có sản phẩm nào.</td>
                            </tr>
                        @endif
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-center">
                                    {{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>
                                    @php
                                        $images = json_decode($product->images, true);
                                    @endphp
                                    @if (count($images) > 0)
                                        <div class="flex flex-row gap-2 h-full">
                                            @if ($images)
                                                @foreach (array_slice($images, 0, 2) as $image)
                                                    <img src="{{ asset($image) }}" alt="Image" class="h-20 w-40 rounded">
                                                @endforeach
                                                @if (count($images) > 2)
                                                    <p class="text-center flex items-center">Và {{ count($images) - 2 }} ảnh
                                                        khác...</p>
                                                @endif
                                            @endif
                                        </div>
                                    @else
                                        <div>Chưa có hình ảnh</div>
                                    @endif
                                </td>
                                <td>{!! $product->description !!}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="mr-1">
                                            <button type="button" class="btn btn-outline-warning p-1 w-8 h-8"> <i
                                                    data-lucide="edit-3"></i></button>
                                        </a>

                                        <a class="mr-1">
                                            <button data-tw-toggle="modal" type="button"
                                                class="btn btn-outline-danger p-1 w-8 h-8"
                                                data-tw-target="#delete-object-confirm-form"
                                                onclick='openConfirmDeleteObjectForm("{{ $product->name }}", {{ $product->id }})'>
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
            <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{ $products->links() }}</div>
        </div>
    </div>
@endsection
