<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataUsers;
use Exception;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $dataUsers = DataUsers::orderBy('updated_at', 'desc')->paginate(6);
        return view ('admin.content.contactIndex', [
            'page' => 'contact-manager', // dùng để active menu
            'dataUsers' => $dataUsers,
        ]);
    }
    public function edit($id): \Illuminate\Http\RedirectResponse
    {
        $dataUser = DataUsers::findOrFail($id);
        try {
            $dataUser->status = 2;
            $dataUser->save();

            return redirect()->route('admin.dataUser.index')->with('success', 'Đã đánh dấu xử lý xong!');
        } catch (Exception $e) {
            return redirect()->route('admin.dataUser.index')->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $dataUser = DataUsers::findOrFail($request->input('del-object-id'));
            $dataUser->delete();

            return redirect()->route('admin.dataUser.index')->with('success', 'Xóa liên hệ thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.dataUser.index')->with('error', 'Xóa liên hệ thất bại: ' . $e->getMessage());
        }
    }
}
