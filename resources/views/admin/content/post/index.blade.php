@extends('admin.layouts.adminApp')
@section('title', $type == 'news' ? 'Bài viết tin tức' : ($type == 'knowledge' ? 'Bài viết kiến thức' : 'Bài viết tuyển dụng'))
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">
                    {{ $type == 'news' ? 'Bài viết tin tức' : ($type == 'knowledge' ? 'Bài viết kiến thức' : 'Bài viết tuyển dụng') }}</a>
            </li>
        </ol>
    </nav>
@endsection
@php
    $routeDelete = route('admin.post.destroy', ['type' => $type]);
@endphp
@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Quản lý
            {{ $type == 'news' ? 'bài viết tin tức' : ($type == 'knowledge' ? 'bài viết kiến thức' : 'bài viết tuyển dụng') }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('admin.post.add', $type) }}"><button class="btn btn-primary shadow-md mr-2"> Thêm mới bài viết
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
                            <th class="whitespace-nowrap text-center">#</th>
                            <th class="whitespace-nowrap">Hình ảnh</th>
                            <th class="whitespace-nowrap">Tên bài viết</th>
                            <th class="whitespace-nowrap">Tiêu đề</th>
                            <th class="whitespace-nowrap">Slug</th>
                            <th class="whitespace-nowrap text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($posts) == 0)
                            <tr>
                                <td class="text-center" colspan="6">Hiện tại không có bài viết nào.</td>
                            </tr>
                        @else
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        {{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->index + 1 }}
                                    </td>
                                    <td>
                                        <img class="h-20 w-40 rounded" src="{{ asset($post->images) }}"
                                            alt="post_{{ $post->title }}_image">
                                    </td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>
                                        <div class="flex justify-center items-center">
                                            <a href="{{ route('admin.post.edit', ['id' => $post->id, 'type' => $type]) }}" class="mr-1">
                                                <button type="button" class="btn btn-outline-warning p-1 w-8 h-8"> <i
                                                    data-lucide="edit-3"></i></button>
                                            </a>

                                            <a class="mr-1">
                                                <button data-tw-toggle="modal" type="button"
                                                    class="btn btn-outline-danger p-1 w-8 h-8"
                                                    data-tw-target="#delete-object-confirm-form"
                                                    onclick='openConfirmDeleteObjectForm("{{ $post->name }}", {{ $post->id }})'>
                                                    <i data-lucide="trash-2"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{ $posts->links() }}</div>
        </div>
    </div>

@endsection
