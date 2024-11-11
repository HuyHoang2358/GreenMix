@extends('admin.layouts.adminApp')
@section('title')
    Cài đặt địa chỉ
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.setting.address.index')}}">Cài đặt địa chỉ</a></li>
        </ol>
    </nav>
@endsection
@section('content')
@endsection
