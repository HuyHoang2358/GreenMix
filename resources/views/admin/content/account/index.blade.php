@extends('admin.layouts.adminApp')
@section('title')
    Quản lý tài khoản
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.account.index') }}">
                    Quản lý tài khoản</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    @include('admin.partials.action_alerts')
    @include('admin.content.account.delete')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Quản lý tài khoản
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('admin.account.add') }}"><button class="btn btn-primary shadow-md mr-2"> Thêm mới tài khoản
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
                            <th class="whitespace-nowrap">Email</th>
                            <th class="whitespace-nowrap">Trạng thái</th>
                            <th class="whitespace-nowrap">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->id }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->email }}</td>
                                <td>
                                    @if ($account->id == 1)
                                        <span
                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Tài
                                            khoản mặc định</span>
                                    @endif

                                    @if ($account->id == $current_user_id)
                                        <span
                                            class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Tài
                                            khoản hiện tại</span>
                                    @endif
                                </td>
                                <td style="width: fit-content;">
                                    <div class="">
                                        <a href="{{ route('admin.account.edit', ['id' => $account->id]) }}" class="mr-1">
                                            <button class="btn btn-primary mr-1 mb-2">
                                                <i data-lucide="edit" class="w-5 h-5"></i>
                                            </button>
                                        </a>

                                        @if ($account->id != 1 && $account->id != $current_user_id)
                                            <a class="mr-1">
                                                <button data-tw-toggle="modal" data-tw-target="#delete-account-form"
                                                    class="btn btn-danger mr-1 mb-2"
                                                    onclick='getAccountForDelete("{{ $account->name }}", {{ $account->id }})'>
                                                    <i data-lucide="trash" class="w-5 h-5"></i>
                                                </button>
                                            </a>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function getAccountForDelete(name, id) {
            document.getElementById('del-account-name').textContent = name;
            document.getElementById('del-account-id').value = id;
        }
    </script>
@endsection
