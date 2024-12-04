<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataUsers;
use Dflydev\DotAccessData\Data;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('admin.homepage', [
            'page' => 'homepage' // dùng để active menu
        ]);
    }
}
