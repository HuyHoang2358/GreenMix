@extends('admin.layouts.adminApp')
@section('title')
    {{$type == 'news' ? 'Bài viết tin tức' :  ($type == 'knowledge' ? 'Bài viết kiến thức' : 'Bài viết tuyển dụng')}}
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.category.index', $type)}}"> {{$type == 'news' ? 'Bài viết tin tức' :  ($type == 'knowledge' ? 'Bài viết kiến thức' : 'Bài viết tuyển dụng')}}</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    
    <textarea id="content">
        Welcome to TinyMCE!
    </textarea>    

@endsection
