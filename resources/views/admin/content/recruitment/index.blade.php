@extends('admin.layouts.adminApp')
@section('title')
    Vị trí tuyển dụng
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang Quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.project.index') }}">Vị trí tuyển
                    dụng</a></li>
        </ol>
    </nav>
@endsection
@php
    use Carbon\Carbon;
@endphp
@section('content')
    @include('admin.partials.action_alerts')
    @include('admin.content.recruitment.delete')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Quản lý tuyển dụng
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('admin.recruitment.add') }}"><button class="btn btn-primary shadow-md mr-2"> Thêm mới vị trí
                    tuyển dụng
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
                            <th class="whitespace-nowrap">Tên</th>
                            <th class="whitespace-nowrap">Thời gian</th>
                            <th class="whitespace-nowrap">Địa chỉ</th>
                            <th class="whitespace-nowrap">Số lượng</th>
                            <th class="whitespace-nowrap">Trạng thái</th>
                            <th class="whitespace-nowrap">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($recruitments) > 0)
                            @foreach ($recruitments as $recruitment)
                                <tr>
                                    <td>{{ $recruitment->id }}</td>
                                    <td>{{ $recruitment->name }}</td>
                                    <td style="max-width: 16rem;">
                                        <div class="flex flex-row items-center gap-2">
                                            <div class="flex flex-col gap-2">
                                                <div>
                                                    Ngày bắt đầu: {{ $recruitment->start_date }}
                                                </div>
                                                <div>
                                                    Ngày kết thúc: {{ $recruitment->end_date }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $recruitment->address }}</td>
                                    <td>{{ $recruitment->num_people }}</td>
                                    <td>
                                        @if (Carbon::parse($recruitment->end_date)->isPast())
                                            <span
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md w-fit">
                                                Đã
                                                hết thời gian tuyển dụng</span>
                                        @else
                                            <span
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md w-fit">
                                                Đang tuyển dụng</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('admin.recruitment.edit', ['id' => $recruitment->id]) }}"
                                                class="mr-1">
                                                <button class="btn btn-primary mr-1 mb-2">
                                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                                </button>
                                            </a>

                                            <a class="mr-1">
                                                <button data-tw-toggle="modal" data-tw-target="#delete-recruitment-form"
                                                    class="btn btn-danger mr-1 mb-2"
                                                    onclick='getRecruitmentForDelete("{{ $recruitment->name }}", {{ $recruitment->id }})'>
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Hiện tại không có tin tuyển dụng nào.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function getRecruitmentForDelete(name, id) {
            document.getElementById('del-recruitment-name').textContent = name;
            document.getElementById('del-recruitment-id').value = id;
        }
    </script>
@endsection
