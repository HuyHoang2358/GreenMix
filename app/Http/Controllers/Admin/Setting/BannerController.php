<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(): Factory|Application|View
    {
        $banners = Banner::orderBy('order', 'asc')->paginate(5);
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

    public function store(Request $request)
    {
        $input = $request->all();
        $item = new Banner();

        $item['name'] = $input['name'];
        $item['title'] = $input['title'];
        $item['description'] = $input['description'];
        $item['attach_link'] = $input['attach_link'];
        $item['is_show'] = $input['is_show'];
        $item['path'] = $input['path'];
        $item['order'] = $input['order'];
        $item->save();

        return redirect()->route('admin.setting.banner.index');
    }
    public function edit($id, Request $request)
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
        $input = $request->all();
        $item = Banner::find($id);

        $item['name'] = $input['name'];
        $item['title'] = $input['title'];
        $item['description'] = $input['description'];
        $item['attach_link'] = $input['attach_link'];
        $item['is_show'] = $input['is_show'];
        $item['path'] = $input['path'];
        $item['order'] = $input['order'];
        $item->save();
        return redirect()->route('admin.setting.banner.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $item = Banner::find($id);
        $item -> delete();
        return redirect()->route('admin.setting.banner.index');
    }
}
