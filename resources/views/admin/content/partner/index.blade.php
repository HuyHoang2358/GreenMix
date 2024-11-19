@extends('admin.layouts.adminApp')
@section('title')
    Đối tác
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{route('admin.homepage')}}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.partner.index')}}">Đối tác </a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
            <h2 class="font-medium text-xl mr-auto">
                Danh sách đối tác
            </h2>
            <a href="{{route('admin.partner.add')}}"><button class="btn btn-primary w-56 h-12"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" data-lucide="plus" class="lucide lucide-plus w-4 h-4 mr-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Thêm mới đối tác </button></a>
        </div>
        <div class="p-5" id="head-options-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Tên Đối Tác</th>
                            <th class="whitespace-nowrap">Logo</th>
                            <th class="whitespace-nowrap">Đường Dẫn Của Đối Tác</th>
                            <th class="whitespace-nowrap">Thứ Tự</th>
                            <th class="whitespace-nowrap">Thao Tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($partners as $key => $partner)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$partner -> name}}</td>
                                <td>
                                    <img class="max-w-32" src="{{$partner -> logo}}" alt="">
                                </td>
                                <td>{{$partner -> url}}</td>
                                <td>{{$partner -> order}}</td>
                                <td>
                                    <div class="">
                                        <a href="{{route('admin.partner.edit', $partner->id)}}" class="mr-1">
                                            <button type="button" class="btn btn-outline-warning p-1 w-8 h-8"> <i data-lucide="edit-3"></i></button>
                                        </a>
                                        <a href="{{route('admin.partner.destroy', $partner->id)}}" class="mr-1" onclick="return confirm('Bạn có muốn xóa đối tác {{$partner->name}}?');">
                                            <button type="button" class="btn btn-outline-danger p-1 w-8 h-8"><i data-lucide="trash-2"></i></button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>{{$partners->links()}}</div>
        </div>
    </div>
@endsection
