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
@endsection
