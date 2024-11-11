<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('admin.content.setting.config.index', [
            'page' => 'setting-config' // dùng để active menu
        ]);
    }
}
