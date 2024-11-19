@extends('admin.layouts.adminApp')
@section('title')
    Quản lý file
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{route('admin.media.files.index')}}">Quản lý files</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')

<iframe src="/admin/laravel-filemanager" style="width: 100%; height: 730px; overflow: hidden; border: none;"></iframe>

@endsection