<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class ProductController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('admin.content.product.index', [
            'page' => 'product-manager' // dùng để active menu
        ]);
    }
}
