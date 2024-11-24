<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class PartnerController extends Controller
{
    public function index(): Factory|Application|View
    {
        $partners = Partner::orderBy('order', 'asc')->paginate(5);
        return view('admin.content.partner.index', [
            'page' => 'partner-manager', // dùng để active menu\
            'partners' => $partners,
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Trả về view thêm mới dự án
        return view('admin.content.partner.createOrUpdateForm', [
            'isUpdate' => false, // dùng để hiển thị form thêm mới
            'item' => null, // dùng để truyền dữ liệu vào form
            'page' => 'partner-manager', // dùng để active menu
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            Partner::create([
                'name' => $request->input('name'),
                'logo' => $request->input('logo'),
                'url' => $request->input('url'),
                'order' => $request->input('order'),
            ]);

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('admin.partner.index')->with('success', 'Thêm mới đối tác thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('admin.partner.index')->with('error', 'Thêm mới đối tác thất bại: ' . $e->getMessage());
        }
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $partner = Partner::find($id);

        return view('admin.content.partner.createOrUpdateForm', [
            'page' => 'partner-manager',
            'isUpdate' => true,
            'item' => $partner,
        ]);
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $partners = Partner::findOrFail($id);
            $partners->name = $request->input('name');
            $partners->logo = $request->input('logo');
            $partners->url = $request->input('url');
            $partners->order = $request->input('order');
            $partners->save();

            return redirect()->route('admin.partner.index')->with('success', 'Cập nhật đối tác thành công!');
        } catch (Exception $e) {
            return redirect()->route('admin.partner.index')->with('error', 'Cập nhật đối tác thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $partner = Partner::findOrFail($request->input('del-object-id'));
            $partner->delete();

            return redirect()->route('admin.partner.index')->with('success', 'Xóa đối tác thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.partner.index')->with('error', 'Xóa đối tác thất bại: ' . $e->getMessage());
        }
    }
}
