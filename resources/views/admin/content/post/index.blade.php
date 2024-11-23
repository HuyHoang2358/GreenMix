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


    <!-- Table title -->
    @include('admin.common.titleTable', [
        'title' => 'Quản lý ' . ($type == 'news' ? 'bài viết tin tức' : ($type == 'knowledge' ? 'bài viết kiến thức' : 'bài viết tuyển dụng')),
        'routeAdd' => route('admin.post.add', ['type' => $type]),
        'titleButton' => 'Thêm mới bài viết'
    ])
    <!-- End Table title -->

    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y col-span-12 lg:col-span-12 mt-4">
        <div class="intro-y box py-2 px-4">
            <div class="overflow-x-auto">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="whitespace-nowrap text-center w-8">#</th>
                            <th class="whitespace-nowrap">Hình ảnh</th>
                            <th class="whitespace-nowrap">Tên bài viết</th>
                            <th class="whitespace-nowrap">Tiêu đề</th>
                            <th class="whitespace-nowrap">Slug</th>
                            <th class="whitespace-nowrap text-center w-24">Thao tác</th>
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
                                            <!-- Edit button -->
                                            @include('admin.common.editButton', [
                                                'routeEdit' => route('admin.post.edit', ['id' => $post->id, 'type' => $type])
                                            ])

                                            <!-- Delete button -->
                                            @include('admin.common.deleteButton', [
                                                'deleteObjectName' => $post->name,
                                                'deleteObjectId' => $post->id
                                            ])

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
