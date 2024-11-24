<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Banner;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(): Factory|Application|View
    {
        $addresses = Address::orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.content.setting.address.index', [
            'page' => 'setting-address',// dùng để active menu
            'addresses' => $addresses,
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Trả về view thêm mới dự án
        return view('admin.content.setting.address.createOrUpdateForm', [
            'isUpdate' => false, // dùng để hiển thị form thêm mới
            'item' => null, // dùng để truyền dữ liệu vào form
            'page' => 'setting-address', // dùng để active menu
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // Tạo mới dự án với dữ liệu được gửi lên từ form
            Address::create([
                'name' => $request->input('name'),
                'detail' => $request->input('detail'),
                'iframe' => $request->input('iframe'),
                'order' => $request->input('order'),
                'is_show' => $request->input('is_show'),
            ]);

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('admin.setting.address.index')->with('success', 'Thêm mới dự án thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('admin.setting.address.index')->with('error', 'Thêm mới dự án thất bại: ' . $e->getMessage());
        }
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $address = Address::find($id);

        return view('admin.content.setting.address.createOrUpdateForm', [
            'page' => 'setting-address',
            'isUpdate' => true,
            'item' => $address,
        ]);
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
        $address = Address::findOrFail($id);
            $address->name = $request->input('name');
            $address->detail = $request->input('detail');
            $address->iframe = $request->input('iframe');
            $address->order = $request->input('order');
            $address->is_show = $request->input('is_show');
            $address->save();

        return redirect()->route('admin.setting.address.index')->with('success', 'Cập nhật dự án thành công!');
    } catch (Exception $e) {
        return redirect()->route('admin.setting.address.index')->with('error', 'Cập nhật dự án thất bại: ' . $e->getMessage());
    }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $address = Address::findOrFail($request->input('del-object-id'));
            $address->delete();

            return redirect()->route('admin.setting.address.index')->with('success', 'Xóa dự án thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.setting.address.index')->with('error', 'Xóa dự án thất bại: ' . $e->getMessage());
        }
    }
}
