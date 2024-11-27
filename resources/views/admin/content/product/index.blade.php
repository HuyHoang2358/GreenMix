@extends('admin.layouts.adminApp')
@section('title', 'Quản lý sản phẩm')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Quản lý sản phẩm </a>
            </li>
        </ol>
    </nav>
@endsection
<!-- Define route for delete action -->
@php
    $routeDelete = route('admin.product.destroy')
@endphp

@section('content')
    <div class="intro-y box">
        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Quản lý sản phẩm',
            'routeAdd' => route('admin.product.add'),
            'titleButton' => 'Thêm mới sản phẩm'
        ])
        <!-- End Table title -->

        <!-- BEGIN: HTML Table Data -->
        <div class=" col-span-12 lg:col-span-12 mt-2">
            <div class="intro-y box py-2 px-4">
                <div class="overflow-x-auto">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="whitespace-nowrap text-center w-8">STT</th>
                                <th class="whitespace-nowrap">Tên</th>
                                <th class="whitespace-nowrap">Slug</th>
                                <th class="whitespace-nowrap w-40 text-center">Hình ảnh</th>
                                <th class="whitespace-nowrap">Mô tả</th>
                                <th class="whitespace-nowrap text-center w-24">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) == 0)
                                <tr>
                                    <td class="text-center" colspan="6">Hiện tại không có sản phẩm nào. <span class="font-semibold">Vui lòng thêm mới sản phẩm!</span></td>
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
                                                        <p class="text-center flex items-center">Và {{ count($images) - 2 }} ảnh khác...</p>
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
                                            <!-- Edit button -->
                                            @include('admin.common.editButton', [
                                                'routeEdit' => route('admin.product.edit', ['id' => $product->id])
                                            ])

                                            <!-- Delete button -->
                                            @include('admin.common.deleteButton', [
                                                'deleteObjectName' => $product->name,
                                                'deleteObjectId' => $product->id
                                            ])

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                @if(count($products) > 0)
                    <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{ $products->links() }}</div>
                @endif

            </div>
        </div>
    </div>
@endsection
