<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('admin.content.setting.address.index', [
            'page' => 'setting-address' // dùng để active menu
        ]);
    }
}
