<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Languague;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class LanguagueController extends Controller
{

    public function index(Request $request): Factory|Application|View
    {
        $languagues = Languague::all();
        return view('admin.content.setting.language.index', [
            'page' => 'setting-language',
            'languagues' => $languagues,
        ]);
    }
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view ('admin.content.setting.language.create', [
            'page' => 'setting-language',
        ]);
    }
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // Tạo mới dự án với dữ liệu được gửi lên từ form
            Languague::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug') ?? Str::slug($request->input('name')),
                'icon' => $request->input('icon')
            ]);

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('admin.setting.language.index')->with('success', 'Thêm mới dự án thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('admin.setting.language.index')->with('error', 'Thêm mới dự án thất bại: ' . $e->getMessage());
        }
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $languague = Languague::find($id);
        $languagues = $request->all();
        return view('admin.content.setting.language.edit', [
            'page' => 'setting-language',
            'languague' => $languague,
            'languagues' => $languagues,
        ]);
    }
    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $languague = Languague::findOrFail($id);

            $languague->name = $request->input('name');
            $languague->slug = $request->input('slug') ?? Str::slug($request->input('name'));
            $languague->icon = $request->input('icon');
            $languague->save();

            return redirect()->route('admin.setting.language.index')->with('success', 'Cập nhật dự án thành công!');
        } catch (Exception $e) {
            return redirect()->route('admin.setting.language.index')->with('error', 'Cập nhật dự án thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $languague = Languague::findOrFail($request->input('del-object-id'));
            $languague->delete();

            return redirect()->route('admin.setting.language.index')->with('success', 'Xóa dự án thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.setting.language.index')->with('error', 'Xóa dự án thất bại: ' . $e->getMessage());
        }
    }
}
