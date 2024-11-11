<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class PartnerController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('admin.content.partner.index', [
            'page' => 'partner-manager' // dùng để active menu
        ]);
    }
}
