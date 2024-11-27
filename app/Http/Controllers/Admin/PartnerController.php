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
        $input = $request->all();
        try {
            Partner::create([
                'name' => $input['name'],
                'logo' => $input['logo'],
                'url' => $input['url'] ?? '#',
                'order' => $input['order'] ?? 0,
            ]);

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('admin.partner.index')->with('success', 'Thêm mới thông tin đối tác thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('admin.partner.index')->with('error', 'Thêm mới thông tin đối tác thất bại: ' . $e->getMessage());
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
        $input = $request->all();
        try {
            $partners = Partner::findOrFail($id);
            $partners->name = $input['name'];
            $partners->logo = $input['logo'] ?? $partners->logo;
            $partners->url = $input['url'] ?? $partners->url;
            $partners->order = $input['order'] ?? $partners->order;
            $partners->save();

            return redirect()->route('admin.partner.index')->with('success', 'Cập nhật thông tin đối tác thành công!');
        } catch (Exception $e) {
            return redirect()->route('admin.partner.index')->with('error', 'Cập nhật thông tin đối tác thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $partner = Partner::findOrFail($request->input('del-object-id'));
            $partner->delete();

            return redirect()->route('admin.partner.index')->with('success', 'Xóa thông tin đối tác thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.partner.index')->with('error', 'Xóa thông tin đối tác thất bại: ' . $e->getMessage());
        }
    }
}
