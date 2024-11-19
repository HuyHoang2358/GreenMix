@extends('admin.layouts.adminApp')
@section('title')
    {{ $type == 'news' ? 'Bài viết tin tức' : ($type == 'knowledge' ? 'Bài viết kiến thức' : 'Bài viết tuyển dụng') }}
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.category.index', $type) }}">
                    {{ $type == 'news' ? 'Bài viết tin tức' : ($type == 'knowledge' ? 'Bài viết kiến thức' : 'Bài viết tuyển dụng') }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')

    @include('admin.partials.action_alerts')
    @include('admin.content.post.delete')

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
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Hình ảnh</th>
                            <th class="whitespace-nowrap">Tên bài viết</th>
                            <th class="whitespace-nowrap">Tiêu đề</th>
                            <th class="whitespace-nowrap">Slug</th>
                            <th class="whitespace-nowrap">Thao tác</th>
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
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <img class="h-10 w-full" src="{{ asset($post->images) }}"
                                            alt="post_{{ $post->title }}_image">
                                    </td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('admin.post.edit', ['id' => $post->id, 'type' => $type]) }}" class="mr-1">
                                                <button class="btn btn-primary mr-1 mb-2"> 
                                                    <i data-lucide="edit" class="w-5 h-5"></i> 
                                                </button>
                                            </a>

                                            <a class="mr-1">
                                                <button data-tw-toggle="modal" data-tw-target="#delete-post-form" class="btn btn-danger mr-1 mb-2" onclick='getPostForDelete("{{ $post->title }}", {{ $post->id }})'>
                                                    <i data-lucide="trash" class="w-5 h-5"></i> 
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
        </div>
    </div>

    <script>

        function getPostForDelete(name, id){
                document.getElementById('del-post-name').textContent = name;
                document.getElementById('del-post-id').value = id;
        }
    
    </script>

@endsection
