<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('admin.content.setting.banner.index', [
            'page' => 'setting-banner' // dùng để active menu
        ]);
    }
}
