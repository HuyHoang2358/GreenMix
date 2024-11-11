@extends('admin.layouts.adminApp')
@section('title')
    Lĩnh vực kinh doanh
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.field.index')}}">Lĩnh vực kinh doanh</a></li>
        </ol>
    </nav>
@endsection
@section('content')
@endsection
