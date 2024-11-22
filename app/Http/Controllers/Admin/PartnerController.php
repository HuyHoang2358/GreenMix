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
        return view('admin.content.partner.create',[
            'page' => 'setting-partner',
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
            return redirect()->route('admin.partner.index')->with('success', 'Thêm mới dự án thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('admin.partner.index')->with('error', 'Thêm mới dự án thất bại: ' . $e->getMessage());
        }
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $partner = Partner::find($id);
        $partners = $request->all();

        return view('admin.content.partner.edit', [
            'page' => 'setting-address',
            'partner' => $partner,
            'partners' => $partners,
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

            return redirect()->route('admin.partner.index')->with('success', 'Cập nhật dự án thành công!');
        } catch (Exception $e) {
            return redirect()->route('admin.partner.index')->with('error', 'Cập nhật dự án thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $partner = Partner::findOrFail($request->input('del-object-id'));
            $partner->delete();

            return redirect()->route('admin.partner.index')->with('success', 'Xóa dự án thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.partner.index')->with('error', 'Xóa dự án thất bại: ' . $e->getMessage());
        }
    }
}
