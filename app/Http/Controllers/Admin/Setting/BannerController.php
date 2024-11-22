<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(): Factory|Application|View
    {
        $banners = Banner::orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.content.setting.banner.index', [
            'page' => 'setting-banner', // dùng để active menu
            'banners' => $banners,
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.content.setting.banner.create',[
           'page' => 'setting-banner',
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            Banner::create([
                'name' => $request->input('name'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'attach_link' => $request->input('attach_link'),
                'is_show' => $request->input('is_show'),
                'path' => $request->input('path'),
                'order' => $request->input('order'),
        ]);

        // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
        return redirect()->route('admin.setting.banner.index')->with('success', 'Thêm mới dự án thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('admin.setting.banner.index')->with('error', 'Thêm mới dự án thất bại: ' . $e->getMessage());
        }
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::find($id);
        $banners = $request->all();

        return view('admin.content.setting.banner.edit', [
            'page' => 'setting-banner',
            'banner' => $banner,
            'banners' => $banners,
        ]);
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $banner = Banner::findOrFail($id);

            $banner->name = $request->input('name');
            $banner->title = $request->input('title');
            $banner->description = $request->input('description');
            $banner->attach_link = $request->input('attach_link');
            $banner->is_show = $request->input('is_show');
            $banner->path = $request->input('path');
            $banner->order = $request->input('order');
            $banner->save();

            return redirect()->route('admin.setting.banner.index')->with('success', 'Cập nhật dự án thành công!');
        } catch (Exception $e) {
            return redirect()->route('admin.setting.banner.index')->with('error', 'Cập nhật dự án thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $banner = Banner::findOrFail($request->input('del-object-id'));
            $banner->delete();

            return redirect()->route('admin.setting.banner.index')->with('success', 'Xóa dự án thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.setting.banner.index')->with('error', 'Xóa dự án thất bại: ' . $e->getMessage());
        }
    }
}
