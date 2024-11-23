@extends('admin.layouts.adminApp')
@section('title', 'Quản lý tài khoản')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Trang quản trị viên</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Quản lý tài khoản</a></li>
        </ol>
    </nav>
@endsection

<!-- Define route for delete action -->
@php($routeDelete = route('admin.account.destroy'))

@section('content')
    <div class="intro-y box">

        <!-- Table title -->
        @include('admin.common.titleTable', [
            'title' => 'Quản lý tài khoản',
            'routeAdd' => route('admin.account.add'),
            'titleButton' => 'Thêm mới tài khoản'
        ])

        <!-- BEGIN: HTML Table Data -->
        <div class="intro-y col-span-12 lg:col-span-12 mt-4">
            <div class="intro-y box py-2 px-4">
                <div class="overflow-x-auto">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="whitespace-nowrap text-center w-8">STT</th>
                                <th class="whitespace-nowrap">Tên</th>
                                <th class="whitespace-nowrap">Email</th>
                                <th class="whitespace-nowrap">Trạng thái</th>
                                <th class="whitespace-nowrap text-center w-24">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td class="text-center">
                                        {{ ($accounts->currentPage() - 1) * $accounts->perPage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>
                                        @if ($account->id == 1)
                                            <span
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Tài khoản mặc định
                                            </span>
                                        @endif

                                        @if ($account->id == $current_user_id)
                                            <span
                                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                                Tài khoản hiện tại
                                            </span>
                                        @endif
                                    </td>
                                    <td class="flex justify-center items-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <!-- Edit button -->
                                            @include('admin.common.editButton', [
                                             'routeEdit' => route('admin.account.edit', ['id' => $account->id])
                                            ])
                                            <!-- Delete button -->
                                            <!-- kiểm tra nếu tài khoản không phải là tài khoản mặc định và tài khoản hiện tại thì hiển thị nút xóa -->
                                            @if ($account->id != 1 && $account->id != $current_user_id)
                                                @include('admin.common.deleteButton', [
                                                    'deleteObjectName' => $account->name,
                                                    'deleteObjectId' => $account->id
                                                ])
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="rounded-b bg-gray-100 p-2 pl-4 border">{{ $accounts->links() }}</div>
            </div>
        </div>
    </div>
@endsection
