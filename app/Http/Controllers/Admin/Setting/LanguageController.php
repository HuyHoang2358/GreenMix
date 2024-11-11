<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class LanguageController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('admin.content.setting.language.index', [
            'page' => 'setting-language' // dùng để active menu
        ]);
    }
}
